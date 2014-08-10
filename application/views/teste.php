<html>
    <head>
        <title></title>
        <script type="text/javascript" src="<?= base_url() ?>ac/jquery-1.4.2.js"></script>
        <script type='text/javascript' src="<?= base_url() ?>ac/jquery.autocomplete.js"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>ac/jquery.autocomplete.css" />
        <script type="text/javascript">
            $().ready(function() {
                $("#course").autocomplete("autoComplete", {
                    width: 260,
                    matchContains: true,
                    selectFirst: false
                });
            });
        </script>
    </head>
    <body>
        <div id="content">
<!--            <form autocomplete="off">-->
                <p>
                    <input type="text" name="course" id="course" class="form-control" />
                </p>
<!--            </form>-->
        </div>
</body>
</html>