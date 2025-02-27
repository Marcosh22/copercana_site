let base_url = document.getElementById('base_url').value;

ClassicEditor
.create(document.querySelector('#editor'), {
    simpleUpload: {
        uploadUrl: `${base_url}post/upload_image`
    },
    fontColor: {
        columns: 10,
        documentColors: 200,
        colors: [{
            color: 'hsl(6, 54%, 95%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 89%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 78%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 68%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 57%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 46%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 41%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 35%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 29%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 24%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 96%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 91%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 83%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 74%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 66%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 57%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 50%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 43%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 37%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 30%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 95%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 91%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 81%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 72%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 63%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 53%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 47%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 40%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 34%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 28%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 95%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 89%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 79%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 68%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 58%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 47%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 42%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 36%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 30%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 25%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 94%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 89%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 78%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 67%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 55%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 44%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 39%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 34%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 28%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 23%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 95%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 91%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 81%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 72%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 63%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 53%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 47%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 40%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 34%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 28%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 94%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 88%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 77%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 65%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 54%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 42%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 37%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 32%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 27%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 22%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 94%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 87%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 74%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 61%)',
            label: ' '
        }, {
            color: 'hsl(168, 45%, 49%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 36%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 31%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 27%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 23%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 19%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 94%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 88%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 77%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 65%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 53%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 42%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 37%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 32%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 27%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 22%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 95%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 90%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 80%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 69%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 59%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 49%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 43%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 37%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 31%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 25%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 95%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 90%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 80%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 70%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 60%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 50%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 44%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 38%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 32%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 26%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 95%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 90%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 80%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 71%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 61%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 51%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 45%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 39%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 33%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 27%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 95%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 90%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 81%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 71%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 61%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 52%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 46%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 39%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 33%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 27%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 94%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 88%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 77%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 65%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 53%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 41%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 36%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 31%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 26%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 22%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 99%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 99%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 97%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 96%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 95%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 94%)',
            label: ' '
        }, {
            color: 'hsl(192, 5%, 82%)',
            label: ' '
        }, {
            color: 'hsl(192, 3%, 71%)',
            label: ' '
        }, {
            color: 'hsl(192, 2%, 60%)',
            label: ' '
        }, {
            color: 'hsl(192, 1%, 49%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 98%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 95%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 90%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 86%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 81%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 76%)',
            label: ' '
        }, {
            color: 'hsl(204, 5%, 67%)',
            label: ' '
        }, {
            color: 'hsl(204, 4%, 58%)',
            label: ' '
        }, {
            color: 'hsl(204, 3%, 49%)',
            label: ' '
        }, {
            color: 'hsl(204, 3%, 40%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 96%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 92%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 85%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 77%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 69%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 62%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 54%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 47%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 40%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 32%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 95%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 91%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 81%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 72%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 62%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 53%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 46%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 40%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 34%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 27%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 93%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 86%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 71%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 57%)',
            label: ' '
        }, {
            color: 'hsl(210, 15%, 43%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 29%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 25%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 22%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 18%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 15%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 92%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 85%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 70%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 55%)',
            label: ' '
        }, {
            color: 'hsl(210, 14%, 39%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 24%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 21%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 18%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 16%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 13%)',
            label: ' '
        }]
    },
    fontBackgroundColor: {
        columns: 10,
        documentColors: 200,
        colors: [{
            color: 'hsl(6, 54%, 95%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 89%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 78%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 68%)',
            label: ' '
        }, {
            color: 'hsl(6, 54%, 57%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 46%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 41%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 35%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 29%)',
            label: ' '
        }, {
            color: 'hsl(6, 63%, 24%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 96%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 91%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 83%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 74%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 66%)',
            label: ' '
        }, {
            color: 'hsl(6, 78%, 57%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 50%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 43%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 37%)',
            label: ' '
        }, {
            color: 'hsl(6, 59%, 30%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 95%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 91%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 81%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 72%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 63%)',
            label: ' '
        }, {
            color: 'hsl(283, 39%, 53%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 47%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 40%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 34%)',
            label: ' '
        }, {
            color: 'hsl(283, 34%, 28%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 95%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 89%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 79%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 68%)',
            label: ' '
        }, {
            color: 'hsl(282, 39%, 58%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 47%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 42%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 36%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 30%)',
            label: ' '
        }, {
            color: 'hsl(282, 44%, 25%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 94%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 89%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 78%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 67%)',
            label: ' '
        }, {
            color: 'hsl(204, 51%, 55%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 44%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 39%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 34%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 28%)',
            label: ' '
        }, {
            color: 'hsl(204, 64%, 23%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 95%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 91%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 81%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 72%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 63%)',
            label: ' '
        }, {
            color: 'hsl(204, 70%, 53%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 47%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 40%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 34%)',
            label: ' '
        }, {
            color: 'hsl(204, 62%, 28%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 94%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 88%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 77%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 65%)',
            label: ' '
        }, {
            color: 'hsl(168, 55%, 54%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 42%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 37%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 32%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 27%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 22%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 94%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 87%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 74%)',
            label: ' '
        }, {
            color: 'hsl(168, 42%, 61%)',
            label: ' '
        }, {
            color: 'hsl(168, 45%, 49%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 36%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 31%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 27%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 23%)',
            label: ' '
        }, {
            color: 'hsl(168, 76%, 19%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 94%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 88%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 77%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 65%)',
            label: ' '
        }, {
            color: 'hsl(145, 45%, 53%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 42%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 37%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 32%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 27%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 22%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 95%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 90%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 80%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 69%)',
            label: ' '
        }, {
            color: 'hsl(145, 61%, 59%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 49%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 43%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 37%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 31%)',
            label: ' '
        }, {
            color: 'hsl(145, 63%, 25%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 95%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 90%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 80%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 70%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 60%)',
            label: ' '
        }, {
            color: 'hsl(48, 89%, 50%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 44%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 38%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 32%)',
            label: ' '
        }, {
            color: 'hsl(48, 88%, 26%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 95%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 90%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 80%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 71%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 61%)',
            label: ' '
        }, {
            color: 'hsl(37, 90%, 51%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 45%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 39%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 33%)',
            label: ' '
        }, {
            color: 'hsl(37, 86%, 27%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 95%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 90%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 81%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 71%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 61%)',
            label: ' '
        }, {
            color: 'hsl(28, 80%, 52%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 46%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 39%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 33%)',
            label: ' '
        }, {
            color: 'hsl(28, 74%, 27%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 94%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 88%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 77%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 65%)',
            label: ' '
        }, {
            color: 'hsl(24, 71%, 53%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 41%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 36%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 31%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 26%)',
            label: ' '
        }, {
            color: 'hsl(24, 100%, 22%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 99%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 99%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 97%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 96%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 95%)',
            label: ' '
        }, {
            color: 'hsl(192, 15%, 94%)',
            label: ' '
        }, {
            color: 'hsl(192, 5%, 82%)',
            label: ' '
        }, {
            color: 'hsl(192, 3%, 71%)',
            label: ' '
        }, {
            color: 'hsl(192, 2%, 60%)',
            label: ' '
        }, {
            color: 'hsl(192, 1%, 49%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 98%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 95%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 90%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 86%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 81%)',
            label: ' '
        }, {
            color: 'hsl(204, 8%, 76%)',
            label: ' '
        }, {
            color: 'hsl(204, 5%, 67%)',
            label: ' '
        }, {
            color: 'hsl(204, 4%, 58%)',
            label: ' '
        }, {
            color: 'hsl(204, 3%, 49%)',
            label: ' '
        }, {
            color: 'hsl(204, 3%, 40%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 96%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 92%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 85%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 77%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 69%)',
            label: ' '
        }, {
            color: 'hsl(184, 9%, 62%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 54%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 47%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 40%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 32%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 95%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 91%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 81%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 72%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 62%)',
            label: ' '
        }, {
            color: 'hsl(184, 6%, 53%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 46%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 40%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 34%)',
            label: ' '
        }, {
            color: 'hsl(184, 5%, 27%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 93%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 86%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 71%)',
            label: ' '
        }, {
            color: 'hsl(210, 12%, 57%)',
            label: ' '
        }, {
            color: 'hsl(210, 15%, 43%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 29%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 25%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 22%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 18%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 15%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 92%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 85%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 70%)',
            label: ' '
        }, {
            color: 'hsl(210, 9%, 55%)',
            label: ' '
        }, {
            color: 'hsl(210, 14%, 39%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 24%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 21%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 18%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 16%)',
            label: ' '
        }, {
            color: 'hsl(210, 29%, 13%)',
            label: ' '
        }]
    },
    toolbar: [
        'heading', '|',
        'fontfamily', 'fontsize', '|',
        'alignment', '|',
        'fontColor', 'fontBackgroundColor', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
        'link', '|',
        'outdent', 'indent', '|',
        'bulletedList', 'numberedList', '|',
        'uploadImage',
        'imageStyle:inline',
        'imageStyle:block',
        'imageStyle:side',
        'toggleImageCaption',
        'imageTextAlternative',
        'mediaEmbed',
        '|',
        'code', 'codeBlock', '|',
        'insertTable', '|',
        'blockQuote', '|',
        'undo', 'redo'
    ]
})
.catch(error => {
    console.error(error);
});

$('#show_at').multiSelect({
    selectableHeader: "<div class='ms-header'>Não exibir em:</div>",
    selectionHeader: "<div class='custom-header'>Exibir em:</div>"
});