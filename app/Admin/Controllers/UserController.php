<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('nickname', __('Nickname'));
//        $grid->column('remember_token', __('Remember token'));
//        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));
//        $grid->column('weixin_openid', __('Weixin openid'));
//        $grid->column('weixin_session_key', __('Weixin session key'));

        $grid->column('login_ip', __('Login ip'));
        $grid->column('city', __('City'));
        $grid->column('province', __('Province'));
        $grid->column('avatar', __('Avatar'))->image();
        $grid->column('gender', __('Gender'));
        $grid->column('phone', __('Phone'));
        $grid->column('add_date', __('Add date'));
        $grid->column('last_login_date', __('Last login date'));
        $grid->column('add_ip', __('Add ip'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nickname', __('Nickname'));
        $show->field('city', __('City'));
        $show->field('province', __('Province'));
        $show->field('avatar', __('Avatar'))->image();
        $show->field('gender', __('Gender'))->using(['1'=>'男',2=>'女',0=>'保密']);
        $show->field('phone', __('Phone'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());
        $form->text('nickname', __('Nickname'));
        $form->image('avatar', __('Avatar'));
        $form->select('gender', __('Gender'))->options([1=>'男',0=>'保密',2=>'女']);
        $form->mobile('phone', __('Phone'));

        return $form;
    }
}
