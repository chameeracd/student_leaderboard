<?php
/**
 * @var \App\View\AppView $this
 */

use Cake\View\Helper\FormHelper;

$this->layout = 'login';
$this->Form->setTemplates([
    'inputContainer' => '{{content}}',
    'label' => false
]);
?>

<div class="container">
    <div class="row">
        <h3><?= __('Leaderboard') ?></h3>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>&nbsp;</th>
                <th><?= __('Page Size') ?></th>
                <th><?= __('Page No:') ?></th>
                <th><?= __('Includes') ?></th>
                <th><?= __('Excludes') ?></th>
            </tr>
            <tr>
                <td><?= $this->Form->control('mock', ['type' => 'checkbox', 'id' => 'mock', 'onclick' => 'getLeaderboard()']) ?></td>
                <td><?= $this->Form->select('size', $sizes, ['default' => 1, 'id' => 'size', 'onclick' => 'getLeaderboard()']) ?></td>
                <td><?= $this->Form->select('page', $sizes, ['default' => 1, 'id' => 'page', 'onclick' => 'getLeaderboard()']) ?></td>
                <td><?= $this->Form->select('include', $assessments, ['empty' => [null => '--All--'], 'id' => 'include', 'multiple' => true, 'onclick' => 'getLeaderboard()']) ?></td>
                <td><?= $this->Form->select('exclude', $assessments, ['empty' => [null => '--NONE--'], 'id' => 'exclude', 'multiple' => true, 'onclick' => 'getLeaderboard()']) ?></td>
            </tr>
        </table>

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
        getLeaderboard();
    });

    function getLeaderboard() {
        var targeturl = "<?= $this->Url->build(["controller" => "Api", "action" => "leaderboard"]); ?>";
        var mock = ($('#mock').prop('checked')) ? 'true' : 'false';
        var size = $('#size').val();
        var page = $('#page').val();
        var include = $('#include').val();
        var exclude = $('#exclude').val();
        $.ajax({
            type: 'get',
            url: targeturl,
            data: {
                mock: mock,
                page_size: size,
                page_number: page,
                include: include,
                exclude: exclude,
            },
            success: function (response) {
                if (response.result) {
                    var table = $('#result');
                    table.html('');
                    var rank = (parseInt(page) - 1) * parseInt(size) + 1;
                    var result = response.result.data;
                    $.each(result, function (i, item) {
                        var name = 'Anonymous';
                        if (item.name != null) {
                            name = item.name
                        }
                        table.append('<tr><td>' + rank + '</td><td>' + name + '</td><td>' + item.total + '</td></tr>')
                        rank++
                    });
                }
            },
            error: function (e) {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
    }
</script>
