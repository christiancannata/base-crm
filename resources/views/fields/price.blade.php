<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
<div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
    <?php endif; ?>

    <?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
        <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
    <?php endif; ?>

    <?php if ($showField): ?>
    <input type="text" name="{{$name}}" value="{{$options['value']}}">
        <?= Form::input($type, $name, $options['value'], $options['attr']) ?>

        <?php include helpBlockPath(); ?>
    <?php endif; ?>

    <?php include errorBlockPath(); ?>

    <?php if ($showLabel && $showField): ?>
        <?php if ($options['wrapper'] !== false): ?>
</div>
<?php endif; ?>
<?php endif; ?>
