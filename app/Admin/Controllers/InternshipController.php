<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Show\ForeachArray;
use App\Models\Internship;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Intervention\Image\ImageManager;

class InternshipController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Internship';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Internship());

        $grid->column('id', __('编号'))->width(50);
        $grid->column('title', __('项目名称'))->width(200)->editable()->setAttributes(['style'=>'color:red']);
        $grid->column('desc', __('简介'))->width(200)->editable();
        $grid->column('category.cate_name', __('所属分类'))->display(function ($cate_name){
            return '<span style="color: #00a7d0">'.$cate_name.'</span>';
        })->width(200);
        $grid->column('cover', __('封面图'))->image('',200,100);
        $grid->column('slider_images',__('轮播图'))->carousel(200,100);
        $grid->column('is_tuijian', __('是否推荐'))->width(80)->switch();
//        $grid->column('goal', __('实习目标'));
        $grid->column('created_at', __('创建时间'))->hide();
        $grid->column('updated_at', __('更新时间'))->hide();
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Internship::findOrFail($id));
        $show->panel()->style('danger')->title('预览');
        $show->field('title', __('项目名称'));
        $show->field('desc', __('简介'));
        $show->field('content', __('内容'));
        $show->field('category.cate_name', __('所属分类'))->label();
        $show->field('cover', __('封面图'))->image();
        $show->field('slider_images', __('轮播图'))->carousel();
        $show->field('is_tuijian', __('是否推荐'))->using(['0'=>'否','1'=>'是']);
        $show->field('goal', __('实习目标'))->label('info');
        $show->field('reward_rules', __('实习奖励'))->label('info');
        $show->field('core_content', __('核心内容'))->label('danger');
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Internship());
        $form->tab('基础内容',function ($form){
            $form->text('title', __('标题'))->autofocus();
            $form->text('desc', __('简介'));
            $form->summernote('content', __('内容'));
            $form->number('cate_id', __('Cate id'));
        });
        $form->tab('图片资源',function ($form){
            $form->image('cover', __('封面图'))->removable()->downloadable();
            $form->multipleImage('slider_images',__('轮播图'))->removable()->sortable();
        });
        $form->tab('实习目标',function ($form){
            $form->list('goal',__('实习目标'));
        });
        $form->tab('实习奖励',function ($form){
            $form->list('reward_rules', __('奖励规则'));
        });
        $form->tab('核心模块',function ($form){
            $form->list('core_content', __('核心模块'));
        });
        $form->tab('扩展',function ($form){
            $form->switch('is_tuijian', __('是否推荐'));
        });
        return $form;
    }
}
