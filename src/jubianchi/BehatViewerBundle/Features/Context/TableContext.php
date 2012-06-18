<?php

namespace jubianchi\BehatViewerBundle\Features\Context;

use \Behat\Mink\Exception,
    \Behat\Gherkin\Node\TableNode;

class TableContext extends BehatViewerContext
{
    public function getMinkContext()
    {
        return $this->getMainContext()->getSubContext('browser');
    }

    protected function makeIndex($number)
    {
        $suffix = 'th';

        switch($number)
        {
            case 1:
                $suffix = 'st';
                break;
            case 2:
                $suffix = 'nd';
                break;
            case 3:
                $suffix = 'rd';
                break;
        }

        return sprintf('%d%s', $number, $suffix);
    }

    /**
     * Checks that the specified table's columns match the given schema
     *
     * @Then /^the columns schema of the "(?P<table>[^"]*)" table should match:$/
     */
    public function theColumnsSchemaShouldMatch($table, TableNode $content)
    {
        $headSelector = sprintf('%s thead tr', $table);
        $head = $this->getMinkContext()->getSession()->getPage()->findAll('css', $headSelector);
        $columns = $head[0]->findAll('css', 'th');

        $hash = $content->getHash();
        $this->iShouldSeeColumnsInTheTable(count($hash), $table);

        foreach($hash as $key => $column)
        {
            if(current($column) != $columns[$key]->getText())
            {
                throw new Exception\ExpectationException(
                    sprintf(
                        'Expected "%s" as %s column but found "%s"',
                        $columns[$key]->getText(),
                        $this->makeIndex($key + 1),
                        current($column)
                    ),
                    $this->getMinkContext()->getSession()
                );
            }
        }
    }

    /**
     * Checks that the specified table contains the given number of columns
     *
     * @Then /^(?:|I )should see (?P<count>\d+) columns? in the "(?P<table>[^"]*)" table$/
     */
    public function iShouldSeeColumnsInTheTable($count, $table)
    {
        $headSelector = sprintf('%s thead tr', $table);
        $head = $this->getMinkContext()->getSession()->getPage()->findAll('css', $headSelector);
        $columns = $head[0]->findAll('css', 'th');

        if(count($columns) != $count)
        {
            throw new Exception\ExpectationException(
                sprintf(
                    'Expected %d column(s) but found %d',
                    $count,
                    count($columns)
                ),
                $this->getMinkContext()->getSession()
            );
        }
    }

    /**
     * Checks that the specified table contains the specified number of rows in its body
     *
     * @Then /^(?:|I )should see (\d+) rows in the (\d+)(?:st|nd|rd|th) "([^"]*)" table$/
     */
    public function iShouldSeeRowsInTheNthTable($occurences, $index, $element)
    {
        $tables = $this->getMinkContext()->getSession()->getPage()->findAll('css', $element);
        if(!isset($tables[$index - 1])) {
            throw new Exception\ElementNotFoundException(sprintf('The %d table "%s" was not found in the page', $index, $element));
        }

        $rows = $tables[$index - 1]->findAll('css', 'tbody tr');

        if(count($rows) != $occurences) {
            throw new Exception\ExpectationException(
                sprintf(
                    'Expected %d row(s) but found %d',
                    $occurences,
                    count($rows)
                ),
                $this->getMinkContext()->getSession()
            );
        }
    }

    /**
     * Checks that the specified table contains the specified number of rows in its body
     *
     * @Then /^(?:|I )should see (\d+) rows? in the "([^"]*)" table$/
     */
    public function iShouldSeeRowsInTheTable($occurences, $element)
    {
        $this->iShouldSeeRowsInTheNthTable($occurences, 1, $element);
    }

    /**
     * Checks that the data of the specified row matches the given schema
     *
     * @Then /^the data in the (\d+)(?:st|nd|rd|th) row of the "([^"]*)" table should match:$/
     */
    public function theDataOfTheRowShouldMatch($index, $element, TableNode $table)
    {
        $rowsSelector = sprintf('%s tbody tr', $element);
        $rows = $this->getMinkContext()->getSession()->getPage()->findAll('css', $rowsSelector);

        if(!isset($rows[$index - 1])) {
            throw new \Behat\Mink\Exception\ExpectationException(
                sprintf('The row %s was not found', $this->makeIndex($index)),
                $this->getMinkContext()->getSession()
            );
        }

        $cells = (array)$rows[$index - 1]->findAll('css', 'td');
        $cells = array_merge((array)$rows[$index - 1]->findAll('css', 'th'), $cells);

        $hash = current($table->getHash());
        $keys = array_keys($hash);

        if(count($cells) != count($hash)) {
            throw new Exception\ExpectationException(
                sprintf(
                    'Expected %d cell(s) but found %d',
                    count($hash),
                    count($cells)
                ),
                $this->getMinkContext()->getSession()
            );
        }

        for($i = 0; $i < count($cells); $i++)
        {
            if($cells[$i]->getText() != $hash[$keys[$i]]) {
                throw new Exception\ExpectationException(
                    sprintf(
                        'Expected "%s" in the %s colums of the %s row but found "%s"',
                        $hash[$keys[$i]],
                        $this->makeIndex($i + 1),
                        $this->makeIndex($index),
                        $cells[$i]->getText()
                    ),
                    $this->getMinkContext()->getSession()
                );
            }
        }
    }

    /**
     * Checks that the specified cell (column/row) of the table's body contains the specified text
     *
     * @Then /^the (\d+)(?:st|nd|rd|th) column of the (\d+)(?:st|nd|rd|th) row in the "([^"]*)" table should contain "([^"]*)"$/
     */
    public function theStColumnOfTheStRowInTheTableShouldContain($colIndex, $rowIndex, $element, $text)
    {
        $rowSelector = sprintf('%s tbody tr', $element);
        $rows = $this->getMinkContext()->getSession()->getPage()->findAll('css', $rowSelector);

        if(!isset($rows[$rowIndex - 1])) {
            throw new \Behat\Mink\Exception\ExpectationException(
                sprintf('The row %s was not found', $this->makeIndex($rowIndex)),
                $this->getMinkContext()->getSession()
            );
        }

        $row = $rows[$rowIndex - 1];
        $colSelector = sprintf('td', $element);
        $cols = $row->findAll('css', $colSelector);

        if(!isset($cols[$colIndex - 1])) {
            throw new Exception\ExpectationException(
                sprintf(
                    'The column %s was not found in the %s row',
                    $this->makeIndex($colIndex),
                    $this->makeIndex($rowIndex)
                ),
                $this->getMinkContext()->getSession()
            );
        }

        $actual = $cols[$colIndex - 1]->getText();

        if(strpos($actual, $text) === false) {
            throw new Exception\ExpectationException(
                sprintf(
                    'texte "%s" was not found in "%s"',
                    $text,
                    $actual
                ),
                $this->getMinkContext()->getSession()
            );
        }
    }

    /**
     * @Then /^the data of the "(?P<element>[^"]*)" table should match:$/
     */
    public function theDataShouldMatch($element, TableNode $table)
    {
        $rowsSelector = sprintf('%s tbody tr', $element);
        $rows = $this->getMinkContext()->getSession()->getPage()->findAll('css', $rowsSelector);
        $hash = $table->getHash();

        if(count($rows) != count($hash)) {
            throw new Exception\ExpectationException(
                sprintf(
                    'Expected %d row(s) but found %d',
                    count($hash),
                    count($rows)
                ),
                $this->getMinkContext()->getSession()
            );
        }

        foreach($rows as $index => $row)
        {
            $cells = (array)$row->findAll('css', 'td');
            $cells = array_merge((array)$row->findAll('css', 'th'), $cells);

            $keys = array_keys($hash[$index]);

            if(count($keys) != count($cells)) {
                throw new Exception\ExpectationException(
                    sprintf(
                        'Expected %d column(s) but found %d',
                        count($keys),
                        count($cells)
                    ),
                    $this->getMinkContext()->getSession()
                );
            }

            for($i = 0; $i < count($cells); $i++)
            {
                if($cells[$i]->getText() != $hash[$index][$keys[$i]]) {
                    throw new Exception\ExpectationException(
                        sprintf(
                            'The content of the cell at [column %d;row %d] (%s) does not match expected data %s',
                            ($i + 1),
                            ($index + 1),
                            $cells[$i]->getText(),
                            $hash[$index][$keys[$i]]
                        ),
                        $this->getMinkContext()->getSession()
                    );
                }
            }
        }
    }
}