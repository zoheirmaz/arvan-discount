<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Coupon",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="zoheirmaz.zm@gmail.com"
 *      ),
 * ),
 * @OA\Server(
 *      url="/api",
 *  )
 */

Route::prefix('/coupon')->group(function () {
    /**
     * @OA\Post(
     *     path="/coupon/create",
     *     summary="Login a user",
     *     tags={"Coupon"},
     *     @OA\RequestBody(
     *          request="Pet",
     *          description="create coupon input data structure",
     *          required=true,
     *          @OA\JsonContent(
     *               @OA\Property(
     *                  property="title",
     *                  type="string",
     *              ),
     *              @OA\Property(
     *                  property="type",
     *                  type="integer",
     *              ),
     *              @OA\Property(
     *                  property="rules",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="rule",
     *                          type="integer",
     *                      ),
     *                      @OA\Property(
     *                          property="values",
     *                          type="array",
     *                          @OA\Items(
     *                              type="string",
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *              @OA\Property(
     *                  property="results",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="result",
     *                          type="integer",
     *                      ),
     *                      @OA\Property(
     *                          property="values",
     *                          type="array",
     *                          @OA\Items(
     *                              type="string",
     *                          ),
     *                      ),
     *                  ),
     *              ),
     *          )
     *     ),
     *     @OA\Response(response="200", description="login sucessful"),
     *     @OA\Response(response="401", description="unauthorized")
     * )
     */
    Route::post('/create', 'CouponController@create');

    /**
     * @OA\Get(
     *     path="/coupon/rules-results",
     *     summary="Get coupons rules and results",
     *     tags={"Coupon"},
     *     @OA\Response(response="200", description="requst is sucessful"),
     *     @OA\Response(response="401", description="unauthorized")
     * )
     */
    Route::get('/rules-results', 'CouponController@getCouponCreationRequirements');

    /**
     * @OA\Post(
     *     path="/coupon/apply",
     *     summary="Apply a coupon to a user",
     *     tags={"Coupon"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="coupon_id",
     *                  type="integer",
     *              ),
     *              @OA\Property(
     *                  property="mobile",
     *                  type="string",
     *              ),
     *          )
     *     ),
     *     @OA\Response(response="200", description="coupon applied successfully"),
     *     @OA\Response(response="401", description="unauthorized")
     * )
     */
    Route::post('/apply', 'CouponController@apply');
});
