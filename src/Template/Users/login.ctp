<?php
/**
 * @var \App\View\AppView $this
 */

 $this->layout = 'login';
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="login-form">
                    <h2><legend><?= __('Login') ?></legend></h2>
                    <?= $this->Form->create() ?>
                    <fieldset>
                        <?php
                            echo $this->Form->control('username');
                            echo $this->Form->control('password');
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Login')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>