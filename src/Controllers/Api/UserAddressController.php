<?php

namespace Qihucms\UserAddress\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Qihucms\UserAddress\Models\UserAddress;
use Qihucms\UserAddress\Resources\UserAddress as UserAddressResource;
use Qihucms\UserAddress\Resources\UserAddressCollection;
use Qihucms\UserAddress\Requests\StoreRequest;

class UserAddressController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * 我的收货地址
     *
     * @param Request $request
     * @return UserAddressCollection
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 15);

        $result = UserAddress::where('user_id', \Auth::id())->latest()->paginate($limit);

        return new UserAddressCollection($result);
    }

    /**
     * 添加收货地址
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse|UserAddressResource
     */
    public function store(StoreRequest $request)
    {
        $data = $request->only(['uri', 'name', 'phone', 'address']);
        $data['user_id'] = \Auth::id();

        $result = UserAddress::create($data);

        if ($result) {
            return new UserAddressResource($result);
        }

        return $this->jsonResponse(['添加失败'], '', 422);
    }

    /**
     * 地址详细
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|UserAddressResource
     */
    public function show($id)
    {
        $result = UserAddress::find($id);

        if ($result) {
            return new UserAddressResource($result);
        }

        return $this->jsonResponse(['地址不存在'], '', 422);
    }

    /**
     * 更新收货地址
     *
     * @param StoreRequest $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->only(['uri', 'name', 'phone', 'address']);
        $data['updated_at'] = now();

        $result = UserAddress::where('user_id', \Auth::id())->where('id', $id)->update($data);

        if ($result) {
            return $this->jsonResponse(['id' => $id]);
        }

        return $this->jsonResponse(['更新失败'], '', 422);
    }

    /**
     * 删除收货地址
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (UserAddress::where('user_id', \Auth::id())->where('id', $id)->delete()) {
            return $this->jsonResponse(['id' => $id]);
        }

        return $this->jsonResponse(['删除失败'], '', 422);
    }
}