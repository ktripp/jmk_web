from django.core.context_processors import csrf
from django.shortcuts import render_to_response
from django.http import HttpResponse
from django.template.loader import get_template
from django.template import Context
from django.http import HttpResponse


def index(request):
	t = get_template('index.html')
	html = t.render(Context())
	return HttpResponse(html)


def about(request):
	t = get_template('about.html')
	html = t.render(Context())
	return HttpResponse(html)


def process(request):
	t = get_template('process.html')
	html = t.render(Context())
	return HttpResponse(html)
	

def gallery_additions(request):
	t = get_template('gallery_additions.html')
	html = t.render(Context())
	return HttpResponse(html)
	

def gallery_remodeling(request):
	t = get_template('gallery_remodeling.html')
	html = t.render(Context())
	return HttpResponse(html)
		

def gallery_decks(request):
	t = get_template('gallery_decks.html')
	html = t.render(Context())
	return HttpResponse(html)
	

def gallery_kitchens(request):
	t = get_template('gallery_kitchens.html')
	html = t.render(Context())
	return HttpResponse(html)
	

def gallery_bathrooms(request):
	t = get_template('gallery_bathrooms.html')
	html = t.render(Context())
	return HttpResponse(html)


def contact(request):
	c = {}
	c.update(csrf(request))
	return render_to_response("contact.html", c)
