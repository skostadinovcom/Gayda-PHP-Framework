<h1>Hello, Wellcome in Gayda</h1>
<h4>Gayda is an amateur PHP Framework created by Stoyan Kostadinov</h4>
<span>Current Version: 0.0.3 Alpha</span>
<br/><br/>
<h3>Posts Example</h3>
{% for post in posts %}
<li>{{ post.title }}</li>
{% endfor %}