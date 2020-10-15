<html>

<head>
    <meta charset="utf-8">
    <title>課題テンプレート</title>
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>

</head>

<body>

<div class="container" id="app">
  <main class="main">
    <section class="block">
        <h1 class="block-title">お問い合わせ</h1>
        <div class="block-body">
        <form action="write.php" method="post" class="form">
          <fieldset>
            <div class="form-group">
              <label for="name">お名前<span class="badge">10文字</span></label>
              <p class="errors" v-for="error in errors.name">{{error}}</p>
              <input type="text" name="name" id="name" v-model="name" v-on:input="validator('name', 10)">
            </div>
            <div class="form-group">
              <label for="subject">件名<span class="badge">20文字</span></label>
              <p class="errors" v-for="error in errors.subject" v-if="error.length > 0">{{error}}</p>
              <input type="text" name="subject" id="subject" v-model="subject" v-on:input="validator('subject', 20)">
            </div>
            <div class="form-group">
              <label for="contents">内容<span class="badge">30文字</span></label>
              <p class="errors" v-for="error in errors.contents" v-if="error.length > 0">{{error}}</p>
              <div class="form-row">
                <textarea type="text" name="contents" id="contents" v-model="contents" v-on:input="validator('contents', 30)"></textarea>
              </div>
            </div>
            <p>
              <input class="button" type="submit" value="送信する">
            </p>
          </fieldset>
        </form>
      </div>
    </section>
  </main>
</div>

<script>
  var vm = new Vue({
    el: '#app',
    data: {
      name: '', //お名前
      subject: '', //件名
      contents: '', //内容
      errors: {
        name: [],
        subject: [],
        contents: []
      }
    },
    methods: {
      validator: function (type, max) {
        let name = []
        let subject = []
        let contents = []
        let message = max + '文字以内で入力してください。'
        if (type === 'name') {
          if (this.name.length > max) {
            name.push(message);
          }
          this.errors.name = name
        } else if (type === 'subject') {
          if (this.subject.length > max) {
            subject.push(message);
          }
          this.errors.subject = subject
        } else if (type === 'contents') {
          if (this.contents.length > max) {
            contents.push(message);
          }
          this.errors.contents = contents
        }
      },
    },
  });
</script>

</body>

</html>
