<?php foreach ($fields as $id => $field): ?><?php if (!empty($field->element_type)): ?><<?php print $field->element_type; ?><?php print drupal_attributes($field->attributes); ?>><?php endif; ?><?php print $field->content; ?><?php if (!empty($field->element_type)): ?></<?php print $field->element_type; ?>><?php endif; ?><?php endforeach; ?>