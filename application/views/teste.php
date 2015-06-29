<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>css/jquery-ui.css" />
        <script type='text/javascript' src="<?= base_url() ?>js/jquery-1.11.1.js"></script>
         <script type='text/javascript' src="<?= base_url() ?>js/jquery-ui.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#course").autocomplete({
                    source: "autoComplete",
                    width: 260,
                    matchContains: true,
                    selectFirst: false
                });
            });
        </script>
    </head>
    <body>
        <div id="content">
            <input type="text" name="course" id="course" class="form-control" />
        </div>
</body>
</html>