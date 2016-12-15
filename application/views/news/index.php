<?php

/* @var $title */
/* @var $content */
?>

<h2><?= $title; ?></h2>

<table id="news-table" class="table table-bordered"></table>

<div class="pull-right pagination">
    <ul id="news-pagination" class="pagination"></ul>
</div>

<script type="text/javascript">
    function renderTable(page) {
        var limit = 10;
        var offset = (page -1) * limit;

        $(".loader").show();

        $.ajax({
            type: 'GET',
            url: '<?= BASE_URL ?>/news/load/' + limit + '/' + offset,
            success: function (result) {

                // render table
                var cels = '<tr><th>ID</th><th>Title</th><th>Content</th><th>Created</th></tr>';

                result = JSON.parse(result);

                for (var i = 0; i < result.data.length; i++) {
                    var record = result.data[i];
                    cels += '<tr><td>' + record.id + '</td><td>' + record.title + '</td><td>' + record.content + '</td><td>' + record.created + '</td></tr>';
                }

                $("#news-table").html(cels);

                // render pagination block
                var pagesCount = result.total / limit;
                var paginationBlock = '';

                for(var j=1; j<=pagesCount; j++){
                    var active = (j == page) ? ' active' : '';
                    paginationBlock += '<li class="page-number' + active + '" data-id="' + j +'"><a href="javascript:renderTable(' + j +')">' + j +'</a></li>';
                }

                $("#news-pagination").html(paginationBlock);

                $(".loader").hide();
            }
        });
    }

    $(document).ready(function () {
        renderTable(1);
    });
</script>

