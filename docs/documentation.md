# TawkTo Chat Plugin

## Chat Component

This plugin provides functionality to integrate [Tawk.to](https://tawk.to) JS Chat Widget into an [Winter CMS](https://wintercms.com) website.

## Requirements

- This plugin requires the `{% scripts %}` placeholder within your layout. ([see the documentation](http://wintercms.com/docs/markup/tag-scripts))

## Plugin Settings

This plugin creates a Settings menu item, found by navigating to ***Settings > Misc > TawkTo Chat***. This page allows the setting of common features, described in more detail below:

- Chat activation switch  
	enables/disables the plugin.
- Chat Site ID  
	Must be set to a valid Tawk.to Site ID.
- Chat Widget Name  
	Must be set to a valid Tawk.to Widget Name.

## Usage

When a **SiteID** and **Widget Name** has been set in the plugin settings, a Javascript asset will be generated under "assets/js/chat.js".

If the plugin **active** setting is switched ON *and* the component is added to a page, the above asset will get injected automatically into the page's JS assets using the `{% scripts %}` placeholder.

	[chat]
	==
	My Page Content

***As an alternative***, if you need more than one instance of the chat on a page (or you want to install a chat component with a different widget name on a page), plugin settings can be optionally overriden by assigning values to the following properties from within the component inspector:

- Chat Site ID (defaults to the plugin setting)
- Chat Widget Name (defaults to the plugin setting)

Just add the following code to your page content:

	[chat]
	siteId = "My-Site-ID"
	widget = "chat-en"
	==
	My Page Content
	{% component "chat" %}

The component will get inserted directly in the layout using the `{% scripts %}` anonymous placeholder, not directly in the page's content.

Note: When overriding plugin settings in the component, the generated asset will ***NOT*** get inserted on top of this.

## Variables

The following variables are injected into the component:

- is_active
- site_id
- widget


## Default component markup

The default markup injects the tawk.to script in the scripts anonymous placeholder.

	{% if __SELF__.is_active %}
	  {% put scripts %}
	<!-- start of Tawk.to script -->
	    <script type="text/javascript">
	      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	      (function(){
	         var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	         s1.async=true;
	         s1.src='https://embed.tawk.to/{{ __SELF__.site_id }}/{{ __SELF__.widget }}" ?>';
	         s1.charset='UTF-8';
	         s1.setAttribute('crossorigin','*');
	         s0.parentNode.insertBefore(s1,s0);
	      })();
	    </script>
	<!-- end of Tawk.to script -->
	  {% endput %}
	{% endif %}

