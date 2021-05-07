<?php

namespace App\Admin\Controllers;

use App\Models\Internship;
use App\Models\Stage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Stage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stage());
        $grid->column('id', __('编号'));
        $grid->column('internship.title', __('实习项目'));
        $grid->column('title', __('标题'));
        $grid->column('stage_goal', __('阶段目标'))->label();
        $grid->column('day_sign', __('是否每日打卡签到'))->switch();
//        $grid->column('created_at',__('创建时间'))->datetime('Y-m-d');
        $grid->column('updated_at',__('更新时间'));
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
        $show = new Show(Stage::findOrFail($id));
        $show->field('internship.title', __('项目'));
        $show->field('title', __('标题'));
        $show->field('stage_goal', __('阶段目标'))->label();
        $show->field('file',__('任务文件'))->label();
        $show->field('day_sign', __('是否每日签到'))->using(['0'=>'签到不纳入考勤','1'=>'签到将纳入考勤']);
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Stage());
        $form->select('internship_id', __('项目'))->options(Internship::all()->pluck('title','id'));
        $form->text('title', __('标题'));
        $form->list('stage_goal', __('阶段目标'));
        $form->multipleFile('file',__('任务内容'))->removable()->sortable();
        $form->switch('day_sign', __('是否每日签到'));

        return $form;
    }
}
