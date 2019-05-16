<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $url = 'http://wordpress.test/wp-json/wp/v2/posts';
    protected $username = 'manager';
    protected $password = 'I6Wn uACu cifk C3it 0M3C ziKV';

    public function index()
    {
        $client = new Client();
        $response = $client->get($this->url);
        $posts = json_decode($response->getBody());
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = array(
            'title' => $request['titulo'],
            'content' => $request['contido'],
            'status' => 'publish'
        );
        $client = new Client([
            'auth' => [
                $this->username,
                $this->password
            ]
        ]);
        $response = $client->post($this->url, [
            RequestOptions::JSON => $params
        ]);
        return redirect(action('PostController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client();
        $response = $client->get($this->url . '/' . $id);
        $post = json_decode($response->getBody());
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $response = $client->get($this->url . '/' . $id);
        $post = json_decode($response->getBody());
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = array(
            'title' => $request['titulo'],
            'content' => $request['contido'],
            'status' => 'publish'
        );
        $client = new Client([
            'auth' => [
                $this->username,
                $this->password
            ]
        ]);
        $response = $client->put($this->url . '/' . $id, [
            RequestOptions::JSON => $params
        ]);
        return redirect(action('PostController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = new Client([
            'auth' => [
                $this->username,
                $this->password
            ]
        ]);
        $client->delete($this->url . '/' . $id);
        return back();
    }
}
