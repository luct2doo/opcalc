<?php 
/**
 * project: 面向对象版图形计算器
 * file: rect.class.php
 * 声明一个矩形子类，根据矩形的特点实现了形状抽象类shape中的周长和面积方法
 * package: shape
 */
class Rect extends Shape {
	// 声明矩形的成员属性宽度
	private $width = 0;
	// 声明矩形的成员属性高度
	private $height = 0;

	// 矩形的构造方法，用表单$_POST中接收的高度和宽度初使化矩形对象
	function __construct() {
		// 为形状命名
		$this->shapeName = "矩形";

		// 通过从shape中继承的方法validate()，对矩形的宽度和高度进行验证
		if ($this->validate($_POST['width'], '宽度') & $this->validate($_POST['height'], '高度')) {
			// 通过超全局数组$_POST将表单输入的宽度给成员属性width赋初值
			$this->width = $_POST['width'];
			// 通过超全局数组$_POST将表单输入的宽度给成员属性height赋初值
			$this->height = $_POST['height'];
		}
	}
	// 按矩形面积的计算公式，实现抽象类shape中的抽象方法area()
		function area() {
			// 访问该方法时，返回矩形的面积
			return $this->width * $this->height;
		}

		// 按矩形周长的计算公式，实现抽象类shape中的抽象方法perimeter()
		function perimeter() {
			// 访问该方法时，返回矩形的周长
			return 2 * ($this->width + $this->height);
		}
}





?>
