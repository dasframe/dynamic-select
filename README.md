# Dinamic Select

> Dynamic Select is a Statamic addon.

> This component simplifies the configuration of data relationships through taxonomies, which means that the information displayed in the second selector dynamically adjusts based on the option selected in the first selector. This provides users with a more intuitive and personalized experience when choosing among different options, as they can view and select only the relevant choices based on their initial selection in the first selector. It's important to note that taxonomies must be related one to many through dependent fields that use a foreign key in the taxonomy acting as the dependent one.

## Features

This addon is designed to assist in retrieving or populating dependent select fields within the content management control panel in Statamic

- 

## How to Install

You can search for this addon in the `Tools > Addons` section of the Statamic control panel and click **install**, or run the following command from your project root:


``` bash

composer require trestudioweb/dynamic-select

```

With composer

ou can install the package via composer:

``` bash 

composer require trestudioweb/dynamic-select

```

## How to Use


1. As a first step, you must create 2 taxonomies that will be related in a one-to-many relationship, ensuring that the dependent taxonomy has a field with a foreign key to link the data to the first taxonomy.

2. Then, create the field type within the content you intend to use.

3. Select the "Dynamic-select" field type in the special section when configuring the blueprints of your content type.

4. In the resource configuration section, select the resource origin, which in this case is "taxonomy." This will enable the configuration section for the 2 taxonomies that will populate the 2 selects.

5. In the configuration of the first taxonomy, there are 3 configuration fields:

  - "First Taxonomy": Here, you select the taxonomy that will populate the first select.
  - "Primary Key": Enter the name of the column that will serve as the primary key within the first taxonomy.
  - "Text Field": Enter the name of the column where the visible text for the end user will be located.

6. In the second taxonomy section, configure the information for the second taxonomy. There are 4 fields for this last select, where you should:

  - Select the "Second Taxonomy" from which you will obtain data for the second select (the dependent one).
  - Specify the "Foreign Key," indicating which is the foreign key of the second taxonomy that will establish the one-to-many  relationship with the first taxonomy.
  - Specify the "Primary Key of the Second Taxonomy."
  - Enter the name of the column that will contain the text or labels in the "Text Field."

