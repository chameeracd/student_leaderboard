<?php
/**
 * @var \App\View\AppView $this
 */

$this->layout = 'login';
?>

<div class="container">
    <div class="row">
        <h3><?= __('Leaderboard') ?></h3>
        <table cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= __('Rank') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Total Score') ?></th>
            </tr>
            </thead>
            <tbody id="result"></tbody>
        </table>
    </div>
</div>

<?php
echo $this->Html->script('jquery-3.3.1.min.js');
?>

<script type="text/javascript">
    $(function () {
        var targeturl = "<?= $this->Url->build(["controller" => "Api", "action" => "leaderboard"]); ?>";
        $.ajax({
            type: 'get',
            url: targeturl,
            success: function (response) {
                if (response.result) {
                    var table = $('#result');
                    table.html('');
                    var result = response.result.data;
                    $.each(result, function(i, item) {
                        var name = 'Anonymous';
                        var rank = i+1;
                        if(item.name != null){
                            name = item.name
                        }
                        table.append('<tr><td>'+rank+'</td><td>'+name+'</td><td>'+item.total+'</td></tr>')
                    });
                }
            },
            error: function (e) {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    });
</script>
