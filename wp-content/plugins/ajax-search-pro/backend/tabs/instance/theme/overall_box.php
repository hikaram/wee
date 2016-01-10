<div class="item">
    <?php
    $o = new wpdreamsThemeChooser("themes", "Theme Chooser", $_themes);
    //$params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsTextSmall("box_width", "Search box width", wpdreams_setval_or_getoption($sd, 'box_width', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
    <p class="descMsg">Use with units (10px or 50% or auto). Default: <strong>100%</strong></p>
</div>
<div class="item"><?php
    $o = new wpdreamsNumericUnit("boxheight", "Search box height", array(
        'value' => wpdreams_setval_or_getoption($sd, 'boxheight', $_dk),
        'units'=>array('px'=>'px')
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsNumericUnit("boxmargin", "Search box margin", array(
        'value' => wpdreams_setval_or_getoption($sd, 'boxmargin', $_dk),
        'units'=>array('px'=>'px', '%'=>'%')
    ));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item"><?php
    $o = new wpdreamsGradient("boxbackground", "Search box background gradient", wpdreams_setval_or_getoption($sd, 'boxbackground', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsBorder("boxborder", "Search box border", wpdreams_setval_or_getoption($sd, 'boxborder', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>
<div class="item">
    <?php
    $o = new wpdreamsBoxShadow("boxshadow", "Search box Shadow", wpdreams_setval_or_getoption($sd, 'boxshadow', $_dk));
    $params[$o->getName()] = $o->getData();
    ?>
</div>