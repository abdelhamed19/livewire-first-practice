<?php

namespace App\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Post extends Component
{
    use WithPagination;

    #[Rule('required|min:4')]
    public $title = "";

    #[Rule('required|min:4')]
    public $body = "";
    public $search ="";
    public $editId ="";
    public $newTitle = "";
    public $newBody = "";
    public function store()
    {
        $this->validate();
        ModelsPost::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);
        $this->reset(['title','body']);
        request()->session()->flash('success', 'Post successfully created.');
    }
    public function delete($id)
    {
        ModelsPost::where('id', $id)->delete();
    }
    public function edit($id)
    {
        $this->editId = $id;
        $this->newTitle = ModelsPost::find($id)->title;
        $this->newBody = ModelsPost::find($id)->body;
    }
    public function update()
    {
        ModelsPost::find($this->editId)->update([
            'title' => $this->newTitle,
        ]);
        request()->session()->flash('success', 'Post updated created.');
        $this->cancel();

    }
    public function cancel ()
    {
        $this->editId = "";
    }

    public function render()
    {
        return view('livewire.post',[
            'posts' => ModelsPost::latest()->whereAny(['title','body'],'like',"%{$this->search}%")->paginate(2)
        ]);
    }
}
