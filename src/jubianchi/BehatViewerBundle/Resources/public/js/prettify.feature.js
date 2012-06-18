PR.registerLangHandler(
    PR.createSimpleLexer(
        [
            [PR.PR_DECLARATION, /^[-:|>?]/, null, '-:|>?'],
            [PR.PR_DECLARATION,  /^%(YAML|TAG)[^#\r\n]+/, null, '%'],
            [PR.PR_TYPE, /^[&]\S+/, null, '&'],
            [PR.PR_TYPE, /^!\S*/, null, '!'],
            [PR.PR_STRING, /^"([^\\"]|\\.)*"/, null, '"'],
            [PR.PR_LITERAL, /^<([^>])*>/, null, "<"],
            [PR.PR_COMMENT, /^#[^\r\n]*/, null, '#'],
        ],
        [
            [PR.PR_DECLARATION, /^(---|[.]{3})(?:[\r\n]|$)/],
            //[PR.PR_KEYWORD, /^\w+:[ \r\n]/],
            [PR.PR_KEYWORD, /^(Feature|Scenario( Outline|)|Examples|Background):[ \r\n]/],
            [PR.PR_KEYWORD, /^(Given|Then|And|But)\s+/],
            [PR.PR_TYPE, /^\s*(\@\w+)\s*[ \r\n]/],
            //[PR.PR_LITERAL, /^(<\w+>)/],
        ]), ['feature', 'feature']
);
