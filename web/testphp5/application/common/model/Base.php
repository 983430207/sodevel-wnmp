<?php
namespace app\common\model;

/**
 * 基础模型类
 * 所有数据模型，都应该作为它的子类存在
 */
class Base extends \think\Model
{
    use \think\model\concern\SoftDelete;
}
