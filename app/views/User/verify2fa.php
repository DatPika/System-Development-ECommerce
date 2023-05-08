<html>
    <head>
        <title><?=_('2FA verificaion')?></title>
    </head>
    <body>
        <form method="post" action="">
            <label><?=_('Current code:')?><input type="text" name="currentCode"></label>
            <input type="submit" name="action" value="<?=_('Verify code')?>">
        </form>
    </body>
</html>