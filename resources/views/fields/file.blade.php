<?php if ($showLabel && $showField): ?>
    <?php if ($options['wrapper'] !== false): ?>
<div <?= $options['wrapperAttrs'] ?> >
    <?php endif; ?>
    <?php endif; ?>

    <?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
        <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
    <?php endif; ?>

    <?php if ($showField): ?>

    <div id="{{$name}}" class="dropzone">
            <?= Form::input('hidden', $name, $options['value'], $options['attr']) ?>
    </div>



        <?php include helpBlockPath(); ?>

    @if($options['value'])
        <a href="#">Elimina</a>
    @endif
    <?php endif; ?>

    <?php include errorBlockPath(); ?>

    <?php if ($showLabel && $showField): ?>
        <?php if ($options['wrapper'] !== false): ?>
</div>
<?php endif; ?>
<?php endif; ?>
