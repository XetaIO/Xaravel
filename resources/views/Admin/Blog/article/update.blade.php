@extends('layouts.admin')
{!! config(['app.title' => 'Update Article']) !!}

@push('scripts')
    {!! Html::script('/vendor/ckeditor/release/ckeditor.js') !!}

    <script type="text/javascript">
        /**
         * CKEditor
         */
        CKEDITOR.plugins.addExternal('pbckcode', '{{ asset('/vendor/ckeditor/plugins/pbckcode-1.2.5/src/plugin.js') }}');
        CKEDITOR.replace('contentBox', {
            customConfig: '../config/article.js'
        });
    </script>
@endpush

@section('content')
<div class="col-sm-12 col-md-10 offset-md-2 p-2">
    {!! $breadcrumbs->render() !!}
</div>
<div class="col-sm-12 col-md-10 offset-md-2 pl-2 pr-2 pb-2">
    <div class="card card-inverse bg-inverse">
        <h5 class="card-header">
            Update : {{ str_limit($article->title, 60) }}
        </h5>
        <div class="card-block">
            {!! Form::model($article, ['route' => ['admin.blog.article.update', $article->id], 'method' => 'put']) !!}

                {!! Form::bsText(
                    'title',
                    'Title',
                    null,
                    ['class' => 'form-control form-control-inverse col-md-6', 'placeholder' => 'Article title...']
                ) !!}

                {!! Form::bsSelect(
                    'category_id',
                    $categories,
                    'Category',
                    null,
                    ['class' => 'form-control form-control-inverse col-md-2']
                ) !!}

                {!! Form::bsCheckbox(
                    "is_display",
                    null,
                    null,
                    "Check to display this article",
                    [
                        'label' => 'Display',
                        'labelClass' => 'custom-control custom-checkbox form-control-inverse d-block'
                    ]
                ) !!}

                {!! Form::bsTextarea(
                    'content',
                    'Content',
                    null,
                    ['id' => 'contentBox', 'class' => 'form-control form-control-inverse']
                ) !!}

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::button('<i class="fa fa-edit" aria-hidden="true"></i> Update', ['type' => 'submit', 'class' => 'btn btn-outline-primary']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer text-muted">
            This article was last edited on {{ $article->updated_at->formatLocalized('%d %B %Y - %T') }}
        </div>
    </div>
</div>
@endsection
