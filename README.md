## Storini Wordpress theme

A bilingual Wordpress theme for hyperlocal news organisations.

Handily, the ZIP download functions as a Wordpress theme package.

You can['t] switch language in Options->Settings, but see [Notes][#notes]

### State

It's a fairly standard theme with a few quirks. It needs a fair bit of work to
bring it up to standard i.e.:

* `functions.php` needs DRYing up and breaking up.
* Required plugins should gracefully degrade when not present.
* All the templates need DRYing up.
* Root in general needs reorganising.
* Theme should have some better way of setting up its own pages than simply
  creating them whenever it's activated. This will let us get rid of having a
  git branch for each locale too.

### Translations

We use [Transifex](http://www.transifex.com/).

To update strings from code:

1. Open `locales/cy.po` in POEdit.
2. Click Update. Verify changes & proceed.
3. File->Save.
4. Run `locales/generate-pot.sh`
5. [Go to the Transifex resource.](https://www.transifex.com/projects/p/storini/resource/wordpress-site/)
6. Click __Update content__
7. Upload the POT file.

To update translations from Transifex:

1. [Go to the Transifex resource.](https://www.transifex.com/projects/p/storini/resource/wordpress-site/)
2. Click __Welsh__, click __Download for use__.
3. Replace `locales/cy.po` with the file you downloaded.
4. Open `locales/cy.po` in POEdit.
5. File->Save (to update `locales/cy.mo`).

There's a way of scripting this stuff using wordpress-i18n-tools, but I found it
more trouble than it's worth.


### Notes

* This theme doesn't need WP_LANG altered, instead rudely taking over control
  of localisation itself. This is because Cardiff weren't happy with having to
  have the Wordpress backend in the same language as the frontend. There are
  plugins for this but they're either commercial or don't support Welsh.
* While you can switch language in Options->Settings, each theme distribution
  will autocreate some pages when it is activated. Since this is before any
  settings can be picked, it creates them in whatever language it defaults to.
  (i.e. Welsh for the Welsh distro, and vice versa). [Edit — there were issues
  with this, so the option has been taken out.]
* Because getting people to install the Welsh distro of Wordpress is a pain,
  I've bundled the Welsh distro's translations in `locales/wordpress`. These are
  used if there aren't any others available.
* Live preview doesn't work beyond the home page. I'm not sure why, I tried to
  work it out but it stumped me. However, it's not much of an issue because the
  theme doesn't work unless its required plugins are installed. So previewing it
  will fail for that reason first (unless you activate it first and install the
  plugins).
* There are secrets in `twitter/index.php`. They're those of the developer of
  the theme. If they deactivate their twitter or are banned or the usage across
  all installations of the theme goes over the twitter rate-limits, all the
  installations will stop showing tweets. On the bright side, they're only read-
  only credentials so there's not much of a security risk.
