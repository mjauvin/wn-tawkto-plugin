# TawkTo Chat Plugin

## Chat Component

This plugin provides functionality to integrate [Tawk.to](https://tawk.to) JS Chat Widget into an [OctoberCMS](https://octobercms.com) website.

## Requirements

This plugin requires the ***{% scripts %}*** placeholder within your layout. ([see the documentation](http://octobercms.com/docs/markup/tag-scripts))

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

If the plugin **active** setting is switched ON *and* the component is added to a page, the above asset will get injected automatically into the page's JS assets using the ***{% scripts %}*** placeholder.

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

The component will get inserted directly in the layout using the ***{% scripts %}*** anonymous placeholder, not directly in the page's content.

Note: When overriding plugin settings in the component, the generated asset will ***NOT*** get inserted on top of this.

