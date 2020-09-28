var editor = new wangEditor('content');

editor.config.uploadImgUrl = 'http://127.0.0.1:8080/laravel54/public/posts/image/upload';

// 设置 headers（举例）
editor.config.uploadHeaders = {
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
};

editor.create();