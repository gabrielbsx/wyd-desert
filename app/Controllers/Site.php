<?php

namespace App\Controllers;

use App\Models\News;
use App\Models\Guides;
use App\Models\GuideArticle;
use App\Models\Ranking;
use App\Models\Rankcity;
use App\Models\Droplist;

class Site extends BaseController
{
	public function index()
	{
		$news = new News();
		$this->data['news_paginate'] = $news->orderBy('id', 'DESC')->paginate(4, 'news');
		$this->data['news_pager'] = $news->pager;
		return view('pages/home', $this->data);
	}

	public function downloads()
	{
		return view('pages/downloads', $this->data);
	}

	public function ranking()
	{
		$ranking = new Ranking();
		$this->data['ranking_paginate'] = $ranking->orderBy('evolution DESC, level DESC')->paginate(10, 'ranking');
		$this->data['ranking_pager'] = $ranking->pager;
		return view('pages/ranking', $this->data);
	}

	public function guides()
	{
		$guides = new Guides();
		$articles = new GuideArticle();
		$this->data['guides'] = $guides->orderBy('id', 'DESC')->get()->getResult('array');
		foreach ($this->data['guides'] as $key => $value) {
			$this->data['guides'][$key]['articles'] = $articles->where(['id_guide' => $value['id']])->orderBy('id', 'ASC')->get()->getResult('array');
		}
		return view('pages/guides', $this->data);
	}

	public function article($id = null)
	{
		if ($id > 0) {
			$article = new GuideArticle();
			$this->data['article'] = $article->where('id', $id)->first();
		} else $this->data['error'] = 'Artigo inexistente!';
		return view('pages/article', $this->data);
	}

	public function login()
	{
		if (!session()->has('login'))
			return view('pages/login', $this->data);
		return redirect()->to(base_url('dashboard'));
	}

	public function droplist()
	{
		$droplist = new Droplist();
		$this->data['droplist'] = $droplist->findAll();
		return view('pages/droplist', $this->data);
	}

	public function register()
	{
		if (!session()->has('login'))
			return view('pages/register', $this->data);
		return redirect()->to(base_url('dashboard'));
	}

	public function recovery()
	{
		if (!session()->has('login'))
			return view('pages/recovery', $this->data);
		return redirect()->to(base_url('dashboard'));
	}

	public function news($id = null)
	{
		if ($id > 0) {
			$news = new News();
			$this->data['news'] = $news->where('id', $id)->first();
		} else $this->data['error'] = 'Notícia inexistente!';
		return view('pages/news', $this->data);
	}
}
