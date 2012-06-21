INSERT INTO `behatviewer_build` (`id`, `project_id`, `date`) VALUES
(1, 1, '1970-01-01 00:00:00');

INSERT INTO `behatviewer_feature` (`id`, `build_id`, `name`, `slug`, `description`) VALUES
(1, 1, 'All statuses', 'failed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere mollis quam sed rhoncus. Lorem ipsum dolor sit amet, consectetur.');

INSERT INTO `behatviewer_scenario` (`id`, `feature_id`, `name`, `slug`, `status`) VALUES
(1, 1, 'Scenario', 'scenario', 'failed');

INSERT INTO `behatviewer_step` (`id`, `scenario_id`, `type`, `background`, `clean_text`, `text`, `file`, `line`, `status`, `definition`, `snippet`, `screen`, `exception`) VALUES
(1, 1, 'Given', 0, 'I am on "/foo/"',    'I am on "/foo/"',    '/foo/bar/scenario.feature', '5', 'passed', 'foo\\bar\\Context\\FeatureContext::visit()', '', '', ''),
(2, 1, 'Then',  0, 'I should see "foo"', 'I should see "foo"', '/foo/bar/scenario.feature', '6', 'failed', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(3, 1, 'And',   0, 'I should see "bar"', 'I should see "bar"', '/foo/bar/scenario.feature', '7', 'skipped', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', ''),
(4, 1, 'Given', 0, 'I am on "/foo/"',    'I am on "/foo/"',    '/foo/bar/scenario.feature', '8', 'pending', 'foo\\bar\\Context\\FeatureContext::visit()', '', '', ''),
(5, 1, 'Then',  0, 'I should see "foo"', 'I should see "foo"', '/foo/bar/scenario.feature', '9', 'undefined', 'foo\\bar\\Context\\FeatureContext::see()',   '', '', '');