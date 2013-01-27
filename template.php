 <?php
function phptemplate_preprocess_page(&$vars) {
	if (isset($vars['node'])) {
		if ($vars['node']->type != "") {
			$vars['theme_hook_suggestions'][] = 'page__node__' . $vars['node']->type ;
		}
	}
}
function phptemplate_menu_tree($pid = 1) {
    if ($tree = phptemplate_menu_tree_improved($pid)) {
        return "\n<ul class=\"menu\">\n". $tree ."\n</ul>\n";
    }    
}

function phptemplate_menu_tree_improved($pid = 1) {
  $menu = menu_get_menu();
  $output = '';

  if (isset($menu['visible'][$pid]) && $menu['visible'][$pid]['children']) {
    $num_children = count($menu['visible'][$pid]['children']);
      for ($i=0; $i < $num_children; ++$i) {
        $mid = $menu['visible'][$pid]['children'][$i];
        $type = isset($menu['visible'][$mid]['type']) ? $menu['visible'][$mid]['type'] : NULL;
        $children = isset($menu['visible'][$mid]['children']) ? $menu['visible'][$mid]['children'] : NULL;
        $extraclass = $i == 0 ? 'first' : ($i == $num_children-1 ? 'last' : '');
        $output .= theme('menu_item', $mid, menu_in_active_trail($mid)
 || ($type & MENU_EXPANDED) ? theme('menu_tree', $mid) : '', count($children) == 0, $extraclass);     
      }
  }

  return $output;
}

function phptemplate_menu_item($mid, $children = '', $leaf = TRUE, $extraclass = '') {
  return '<li class="'. ($leaf ? 'leaf' : ($children ? 'expanded' : 'collapsed')) . ($extraclass ? ' ' . $extraclass : '')
 . '">'. menu_item_link($mid, TRUE, $extraclass) . $children ."</li>\n";
}

function logopedie_preprocess_html(&$variables) {
	if (!empty($variables['page']['sidebar_first']) && !empty($variables['page']['sidebar_second'])) {
    print $variables;
  }
}

?>
