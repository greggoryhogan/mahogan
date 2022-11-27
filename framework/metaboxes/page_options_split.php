<div class="cp_metabox">
<?php
  $this->cp_race_select(
    'split_section_background',
    'Background Color',
    array(
      'white' => 'White',
      'grey'  => 'Light Grey'
    )
  );
  $this->cp_race_text(
    'split_section_title',
    'Section Title'
  );
  $this->cp_race_text(
    'split_section_subtitle',
    'Section Subtitle'
  );
  $this->cp_race_upload(
    'split_section_image',
    'Background Image'
  );
  $this->cp_race_select(
    'split_section_image_position',
    'Image Position',
    array(
      'left'  => 'Left',
      'right' => 'Right'
    )
  );
  $this->cp_race_select(
    'split_section_title_align',
    'Title Align',
    array(
      'left'    => 'Left',
      'right'   => 'Right',
      'center'  => 'Center'
    )
  );
  $this->cp_race_select(
    'split_section_animation',
    'Enable animation?',
    array(
      'yes' => 'Yes',
      'no'  => 'No'
    )
  )
?>
</div>