from django.conf.urls import patterns, include, url
from views import index, about, process, gallery_additions, gallery_remodeling, gallery_kitchens, gallery_bathrooms, gallery_decks, contact

# Uncomment the next two lines to enable the admin:
# from django.contrib import admin
# admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'jmk_web.views.home', name='home'),
    # url(r'^jmk_web/', include('jmk_web.foo.urls')),

    # Uncomment the admin/doc line below to enable admin documentation:
    # url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    # url(r'^admin/', include(admin.site.urls)),

	url(r'^$', index),
	url(r'index', index),
	url(r'about', about),
	url(r'process', process),
	url(r'gallery_additions', gallery_additions),
	url(r'gallery_remodeling', gallery_remodeling),
	url(r'gallery_decks', gallery_decks),
	url(r'gallery_kitchens', gallery_kitchens),
	url(r'gallery_bathrooms', gallery_bathrooms),
	url(r'contact', contact),
)
