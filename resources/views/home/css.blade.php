<title>Funime</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

  <link rel="icon" href="{{asset ("movies/images/logo12.png")}}">

    <!--Google Font-->
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">
  

	<!-- CSS files -->
	<link rel="stylesheet" href="{{asset ("movies/css/plugins.css")}}">
	<link rel="stylesheet" href="{{asset ("movies/css/style.css")}}">
  {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}

	<style>

.search-container {
        position: relative;
        width: 300px;
    }

    #search-query {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    .search-results {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .search-item {
        display: flex;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    .search-item:last-child {
        border-bottom: none;
    }

    .search-item-image img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
    }

    .search-item-details {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .search-item-name {
        font-weight: bold;
    }

    .search-item-description {
        font-size: 0.9em;
        color: #666;
    }


		.sidebar {
  background-color: #000000;
  padding: 20px;
  border-radius: 10px;
}

.sb-title {
  margin-bottom: 20px;
  font-size: 18px;
  font-weight: bold;
}

.aba-card {
  display: flex;
  align-items: center;
  margin-bottom: 20px;
  background-color: #fff;
  padding: 10px;
  border-radius: 15px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.aba-logo {
  margin-right: 15px;
}

.aba-account .account {
  text-align: left;
}

.acc-name {
  font-size: 16px;
  font-weight: bold;
}

.acc-num {
  font-size: 14px;
  color: #888;
}

.ads img {
  width: 100%;
  border-radius: 10px;
}

.sb-facebook, .sb-twitter {
  margin-top: 20px;
}

.slick-tw .tweet {
  margin-bottom: 10px;
}

#footer-wrapper {
  background-color: #222;
  color: #fff;
  padding: 20px 0;
}

.flex-col {
  display: flex;
  flex-direction: column;
}

.flex-center {
  display: flex;
  justify-content: center;
  align-items: center;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.row-x9 {
  display: flex;
  flex-wrap: wrap;
}

.section {
  margin-bottom: 20px;
}

.about-section {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}

.footer-logo img {
  width: 120px;
  height: auto;
}

.footer-info {
  flex: 1;
  margin-left: 20px;
  min-width: 200px;
}

.image-caption {
  font-size: 14px;
  line-height: 1.6;
  word-break: break-word;
}

.social-icons {
  list-style: none;
  padding: 0;
  display: flex;
}

.social-icons li {
  margin-right: 10px;
}

.social-icons a {
  display: block;
  width: 30px;
  height: 30px;
  background-size: cover;
  border-radius: 50%;
}

.facebook-f a {
  background-image: url('facebook-icon-url');
}

.youtube a {
  background-image: url('youtube-icon-url');
}

.telegram a {
  background-image: url('telegram-icon-url');
}

.footer-bar {
  border-top: 1px solid #444;
  padding: 10px 0;
}

.flex-between {
  display: flex;
  justify-content: space-between;
}

.footer-copyright {
  font-size: 14px;
}

.footer-menu {
  font-size: 14px;
}

.link-list {
  list-style: none;
  padding: 0;
  display: flex;
}

.link-list li {
  margin-right: 10px;
}

.link-list a {
  color: #fff;
  text-decoration: none;
}

.link-list a:hover {
  text-decoration: underline;
}

	</style>