<?php 
/**
 * project: 面向对象版图形计算器
 * file: form.class.php
 * 选择不同的图形时输出对应的表单对象，在主脚本程序中提供给用户一个操作界面
 * package: shape
 */

class Form {
	// 表单form属性action的值，用于设置表单提交的位置
	private $aciton;
	// 用户选择形状的动作
	private $shape;

	// 构造方法，用于对用户的操作动作和表单提交的位置进行初始化赋值
	function __construct($action = '') {
		// 为表单form中的action属性赋值
		$this->action = $action;
		// 用户选择形状的动作，默认为矩形rect
		$this->shape = isset($_GET['action']) ? $_GET['action'] : 'rect';
	}

	// 魔术方法__toString()，通过用户不同的请求，返回用户需要的表单字符串，在页面中显示
	function __toString() {
		$form = '<form action="'.$this->action.'?action='.$this->shape.'"method="post">';

		// 根据用户的get请求组合成方法名称字符串，getRect(),getTriangle(),getCircle()
		$shape = 'get'.ucfirst($this->shape);
		// 调用私有方法获取圆形的输入表单
		$form .= $this->$shape();

		$form .= '<br><input type="submit" name="sub" value="计算"><br>';
		$form .= '</form>';
		// 返回用户需要的输入形状表单界面
		return $form;
	}

	// 私有方法，用于获取矩形的表单输入
	private function getRect() {
		$input = '<b>请输入 | 矩形 | 的宽度和高度: </b><p>';
		$input .= '宽度: <input type="text" name="width" value="'.$_POST['width'].'"><br>';
		$input .= '高度: <input type="text" name="height" value="'.$_POST['height'].'"><br>';
		return $input; 
	}

	// 私有方法，用于获取三角形的表单输入
	private function getTriangle() {
		$input = '<b>请输入 | 三角形 | 的三条边: </b><p>';
		$input .= '第一边: <input type="text" name="side1" value="'.$_POST['side1'].'"><br>';
		$input .= '第二边: <input type="text" name="side2" value="'.$_POST['side2'].'"><br>';
		$input .= '第三边: <input type="text" name="side3" value="'.$_POST['side3'].'"><br>';
		return $input;
	}

	// 私有方法，用于获取圆形的表单输入
	private function getCircle() {
		$input = '<b>请输入 | 圆形 | 的半径: </b><p>';
		$input .= '半径: <input type="text" name="radius" value="'.$_POST['raidus'].'"><br>';
		return $input;
	}
}




?>
