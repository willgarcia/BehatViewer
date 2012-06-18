INSERT INTO `behatviewer_definition` (`id`, `project_id`, `snippet`, `context`, `method`, `description`) VALUES
(1,  1, 'Given /^I load the "(?P<fixture>[^"]*)" fixture$/', 'FixtureContext', 'iLoadTheFixture()', NULL),
(2,  1, 'Given /^I (do not|don''t) follow redirects?$/', 'BrowserContext', 'theRedirectionsAreIntercepted()', NULL),
(3,  1, 'When /^I follow (|the) redirections?$/', 'BrowserContext', 'iFollowTheRedirection()', NULL),
(4,  1, 'Given /^I (?:follow|click on) the (?P<index>\d+)(?P<suffix>st|nd|rd|th) "(?P<link>[^"]*)" link$/', 'BrowserContext', 'iFollowTheNthLink()', NULL),
(5,  1, 'Then /^I should see an image named "(?P<image>[^"]*)"$/', 'BrowserContext', 'iShouldSeeImageNamed()', NULL),
(6,  1, 'Then /^I should see:$/', 'BrowserContext', 'iShouldSee()', NULL),
(7,  1, 'Given /^(?:|I )am on "(?P<page>[^"]+)"$/', 'BrowserContext', 'visit()', 'Opens specified page.'),
(8,  1, 'When /^(?:|I )go to "(?P<page>[^"]+)"$/', 'BrowserContext', 'visit()', 'Opens specified page.'),
(9,  1, 'When /^(?:|I )reload the page$/', 'BrowserContext', 'reload()', 'Reloads current page.'),
(10, 1, 'When /^(?:|I )move backward one page$/', 'BrowserContext', 'back()', 'Moves backward one page in history.');