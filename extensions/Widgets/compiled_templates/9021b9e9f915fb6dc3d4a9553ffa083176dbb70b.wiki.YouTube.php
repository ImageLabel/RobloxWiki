<?php /* Smarty version Smarty-3.1.7, created on 2013-12-17 21:48:31
         compiled from "wiki:YouTube" */ ?>
<?php /*%%SmartyHeaderCode:59500985852b0c6afa93c99-05704221%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9021b9e9f915fb6dc3d4a9553ffa083176dbb70b' => 
    array (
      0 => 'wiki:YouTube',
      1 => 20131217180525,
      2 => 'wiki',
    ),
  ),
  'nocache_hash' => '59500985852b0c6afa93c99-05704221',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'width' => 0,
    'height' => 0,
    'playlist' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_52b0c6afb5ff2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b0c6afb5ff2')) {function content_52b0c6afb5ff2($_smarty_tpl) {?>

<iframe width="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['width']->value, ENT_QUOTES, 'ISO-8859-1', true))===null||$tmp==='' ? '425' : $tmp);?>
" height="<?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['height']->value, ENT_QUOTES, 'ISO-8859-1', true))===null||$tmp==='' ? 355 : $tmp);?>
" src="http://www.youtube.com/embed/<?php if (isset($_smarty_tpl->tpl_vars['playlist']->value)){?>?listType=playlist&list=<?php echo str_replace("%2F", "/", rawurlencode($_smarty_tpl->tpl_vars['playlist']->value));?>
<?php }else{ ?><?php echo str_replace("%2F", "/", rawurlencode($_smarty_tpl->tpl_vars['id']->value));?>
<?php }?>" frameborder="0" allowfullscreen></iframe><?php }} ?>