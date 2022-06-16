<?php

namespace test;

use app\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    protected $router = null;

    /**
     * this setUp function is called before EACH test is run
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    /**
     * Testing Router->Register() funciton
     */

    // the following line indicate the following method is a test function 
    // if the function name doesn't have prefix test_
    /** @test */
    public function isRegisterARoute(): void
    {
        //given that we have a router object
        $router = new Router();

        //when call a register method
        $router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ]
        ];
        //then assert route was registerd
        $this->assertEquals($expected, $router->routes());
    }

    //this function has prefix test_ to indicate that's a test method
    public function testIsRegisterARoute(): void
    {
        //given that we have a router object
        $router = new Router();

        //when call a register method
        $router->register('get', '/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ]
        ];
        //then assert route was registerd
        $this->assertEquals($expected, $router->routes());
    }

    public function testIsRegisterGetRoute(): void
    {
        //using the Router from setUp()
        $this->router->get('/users', ['Users', 'index']);

        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];
        $this->assertEquals($expected, $this->router->routes());
    }

    public function testIsRegisterPostRoute(): void
    {
        $router = new Router();
        $router->post('/users', ['Users', 'index']);

        $expected = [
            'post' => [
                '/users' => ['Users', 'index'],
            ],
        ];
        $this->assertEquals($expected, $router->routes());
    }

    public function testThereAreNoRoutesWhenRouterIsCreated(): void
    {
        $this->assertEmpty($this->router->routes());
    }


    /**
     * test exception
     * 
     * Using DataProvicer
     * 
     * 1) using as funciton 
     * @ dataProvider routeNotFoundCases
     * a data provider method must be PUBLIC and either return an array or arrays
     * or an object that implements the ITERATOR interfgace and yields an array for each iteration step.
     * For each array that is part of the collection the test method will be called with the contents 
     * of the aray as its arguments
     * 
     * 2) using the dataProvider as a class
     * @dataProvider \test\Unit\DataProvider::routeNotFoundCases
     *
     * @param string $requestUri
     * @param string $requestMethod
     * @return void
     */
    public function testItThrowRouteNotFoundException(string $requestUri, string $requestMethod): void
    {
        $users = new class()
        {
            public function delete(): bool
            {
                return true;
            }
        };
        $this->router->post('/users', [$users::class, 'store']);
        $this->router->get('/users', ['Users', 'index']);

        $this->expectException(\Exception::class);
        $this->router->resolve($requestUri, $requestMethod);
    }


    /**
     * this function has been registered as dataProvider,
     * it will provide to functions which has @ dataProvider specified
     * in this example, it's the testItThrowRouteNotFoundException(), 
     * the each filed/element of the array, will be assigned to 
     * testItThrowRouteNotFoundException(arrayElementA, arrayElementB);
     *
     * @return array
     */
    public function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/invoices', 'post'],
            ['/users', 'get'],
            ['/users', 'post'],
        ];
    }




    public function testItResolvesRouteFromAClosure(): void
    {
        // register the router first
        $this->router->get('/users', fn () => [1, 2, 3]);
        //then call the resolve func()
        $result = $this->router->resolve('/users', 'get');

        $expected = [1, 2, 3];

        $this->assertEquals($expected, $result);
    }


    public function testItResolversRoute(): void
    {
        $users  = new class(){
            public function index():array
            {
                return [1,2,3];
            }
        };
        $this->router->get('/users',[$users::class,'index']);
        $result = $this->router->resolve('/users','get');
        $expected = [1,2,3];
        // asertEqueals like ==, just check the value
        $this->assertEquals($expected,  $result);
        
        // asertSame like ===, check the value and type
        $this->assertSame($expected,$result);

        //NOTE: for object, 
        // assertSame ONLY pass if the expected and result are point to the same object,
        // assertEques will pass if the two object are same

    }
}
