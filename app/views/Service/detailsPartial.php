<dl>
    <dt><?= _('Description') ?></dt>
    <dd><?= $data->description?></dd>

    <dt><?= _('Appointment date and time :') ?></dt>
    <dd><?= \app\core\TimeHelper::DTOutBrowser($data->datetime); ?></dd>

    <dt><?= _('Appointment Location :') ?></dt>
    <dd><?= $data->name; ?></dd>
</dl>