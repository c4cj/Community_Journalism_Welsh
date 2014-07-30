#!/bin/sh

# Transifex is pretty strict about the POTs it will accept. While others will
# accept renamed PO files, we have to do a bit of processing to ours to make it
# fit. Here it is.

# Header to first double newline.
cat cy.po \
  | perl -0777 -pe 's/\n\n(.|\n)*$//m' \
  > storiniWordpress.pot

echo "" >> storiniWordpress.pot
echo "" >> storiniWordpress.pot

# Remove header, all translations, and all plurals 2+
cat cy.po \
  | perl -0777 -pe 's/^(.|\n)*?\n\n//m' \
  | perl -0777 -pe 's/(msgstr(\[[0-9]\])?) (".*"\n)+/\1 ""\n/mg' \
  | perl -0777 -pe 's/msgstr\[[2-9]\].*\n//g' \
  >> storiniWordpress.pot
