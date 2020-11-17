<?php

namespace Qihucms\UserAddress\Controllers\Admin;

use App\Admin\Controllers\Controller;
use App\Models\User;
use Qihucms\UserAddress\Models\UserAddress;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserAddressController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '会员地址';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserAddress);

        $grid->model()->orderBy('id', 'desc');

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('user.username', __('user.username'));
            $filter->like('uri', __('user-address::address.uri'));
            $filter->like('name', __('user-address::address.name'));
            $filter->like('address', __('user-address::address.address'));

        });

        $grid->column('id', __('user-address::address.id'));
        $grid->column('user.username', __('user.username'));
        $grid->column('uri', __('user-address::address.uri'));
        $grid->column('name', __('user-address::address.name'));
        $grid->column('phone', __('user-address::address.phone'));
        $grid->column('address', __('user-address::address.address'));

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
        $show = new Show(UserAddress::findOrFail($id));

        $show->field('id', __('user-address::address.id'));
        $show->field('user_id', __('user-address::address.user_id'));
        $show->field('uri', __('user-address::address.uri'));
        $show->field('name', __('user-address::address.name'));
        $show->field('phone', __('user-address::address.phone'));
        $show->field('address', __('user-address::address.address'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserAddress);

        $form->select('user_id', __('user-address::address.user_id'))
            ->options(function ($use_id) {
                $model = User::find($use_id);
                if ($model) {
                    return [$model->id => $model->username];
                }
            })
            ->ajax(route('admin.api.users'))
            ->rules('required');

        $form->text('uri', __('user-address::address.uri'));
        $form->text('name', __('user-address::address.name'));
        $form->mobile('phone', __('user-address::address.phone'));
        $form->textarea('address', __('user-address::address.address'));

        return $form;
    }
}