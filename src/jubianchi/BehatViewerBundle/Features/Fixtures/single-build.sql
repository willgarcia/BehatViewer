INSERT INTO `behatviewer_build` (`id`, `project_id`, `date`) VALUES
(1, 1, '1970-01-01 00:00:00');

INSERT INTO `behatviewer_feature` (`id`, `build_id`, `name`, `slug`, `description`) VALUES
(1, 1, 'Passed', 'passed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere mollis quam sed rhoncus. Lorem ipsum dolor sit amet, consectetur.'),
(2, 1, 'Failed', 'failed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere mollis quam sed rhoncus. Lorem ipsum dolor sit amet, consectetur.');

INSERT INTO `behatviewer_scenario` (`id`, `feature_id`, `name`, `slug`, `status`) VALUES
(1, 1, 'Passed', 'passed', 'passed'),
(2, 2, 'Failed', 'failed', 'failed');

INSERT INTO `behatviewer_step` (`id`, `scenario_id`, `type`, `background`, `clean_text`, `text`, `file`, `line`, `status`, `definition`, `snippet`, `screen`, `exception`) VALUES
(1, 1, 'Given', 0, 'I am on "/foo/"',    'I am on "/foo/"',    '/foo/bar/passed.feature', '5', 'passed', 'foo\\bar\\Context\\FeatureContext::visit()', '', '', ''),
(2, 1, 'Then',  0, 'I should see "foo"', 'I should see "foo"', '/foo/bar/passed.feature', '6', 'passed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(3, 1, 'And',   0, 'I should see "bar"', 'I should see "bar"', '/foo/bar/passed.feature', '7', 'passed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(4, 2, 'Given', 0, 'I am on "/foo/"',    'I am on "/foo/"',    '/foo/bar/passed.feature', '5', 'passed', 'foo\\bar\\Context\\FeatureContext::visit()', '', '', ''),
(5, 2, 'Then',  0, 'I should see "foo"', 'I should see "foo"', '/foo/bar/passed.feature', '6', 'passed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(6, 2, 'And',   0, 'I should see "bar"', 'I should see "bar"', '/foo/bar/passed.feature', '7', 'passed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(7, 2, 'And',   0, 'I should see "baz"', 'I should see "baz"', '/foo/bar/passed.feature', '8', 'passed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(8, 2, 'And',   0, 'I should see "boo"', 'I should see "boo"', '/foo/bar/passed.feature', '9', 'failed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', 'This is the exception message');