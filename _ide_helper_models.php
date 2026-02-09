<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $firm_name
 * @property int $years_of_experience
 * @property string $specialization
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $pincode
 * @property string $portfolio
 * @property string $status
 * @property string $portfolio_verification
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $change_log_remark
 * @property string|null $logo
 * @property string|null $banner
 * @property string|null $about
 * @property string|null $description
 * @property string|null $website
 * @property int $profile_completion
 * @property string|null $about_section_image
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereAboutSectionImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereChangeLogRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereFirmName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect wherePortfolio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect wherePortfolioVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereProfileCompletion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect whereYearsOfExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Architect withoutTrashed()
 */
	class Architect extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectAward whereUserId($value)
 */
	class ArchitectAward extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectCertificate whereUserId($value)
 */
	class ArchitectCertificate extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectEnquiry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectEnquiry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectEnquiry query()
 */
	class ArchitectEnquiry extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ArchitectGallery whereUserId($value)
 */
	class ArchitectGallery extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $table_name
 * @property int $row_id
 * @property string $column_name
 * @property string|null $old_value
 * @property string|null $new_value
 * @property string $change_type
 * @property string $changed_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $remark
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereChangeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereChangedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereColumnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereNewValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereOldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereRowId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ChangeLog whereUpdatedAt($value)
 */
	class ChangeLog extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $seller_subcategory_id
 * @property string $name
 * @property string|null $description
 * @property array<array-key, mixed> $images
 * @property array<array-key, mixed>|null $finishes
 * @property array<array-key, mixed>|null $sizes
 * @property string|null $thickness
 * @property string|null $color
 * @property string|null $quality
 * @property array<array-key, mixed>|null $usage_area
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SellerSubcategory $subcategory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereFinishes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSellerSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereThickness($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUsageArea($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $state
 * @property string $city
 * @property string $message
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ProductEnquiry whereUpdatedAt($value)
 */
	class ProductEnquiry extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $business_name
 * @property string $gst_number
 * @property string|null $gst_certificate
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $pincode
 * @property string|null $geo_location
 * @property string $gst_verification
 * @property string $location_verification
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $change_log_remark
 * @property string|null $logo
 * @property string|null $banner
 * @property string|null $website
 * @property string|null $about
 * @property int|null $years_of_experience
 * @property int $profile_completion
 * @property string|null $description
 * @property string|null $warehouse_image
 * @property string|null $office_image
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereChangeLogRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereGeoLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereGstCertificate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereGstNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereGstVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereLocationVerification($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereOfficeImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller wherePincode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereProfileCompletion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereWarehouseImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller whereYearsOfExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Seller withoutTrashed()
 */
	class Seller extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerAward withoutTrashed()
 */
	class SellerAward extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerCertificate withoutTrashed()
 */
	class SellerCertificate extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $domain
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerSubcategory> $subCategories
 * @property-read int|null $sub_categories_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerDomain withoutTrashed()
 */
	class SellerDomain extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $phone
 * @property string|null $email
 * @property string $type
 * @property string $message
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerEnquiry whereUserId($value)
 */
	class SellerEnquiry extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerGallery whereUserId($value)
 */
	class SellerGallery extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $seller_domain_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SellerDomain $domain
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory whereSellerDomainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SellerSubcategory whereUpdatedAt($value)
 */
	class SellerSubcategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string|null $phone_number
 * @property string|null $app_token
 * @property string|null $web_token
 * @property string|null $auth_token
 * @property string|null $change_log_remark
 * @property-read \App\Models\Architect|null $architect
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ArchitectAward> $architectAwards
 * @property-read int|null $architect_awards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ArchitectCertificate> $architectCertificates
 * @property-read int|null $architect_certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ArchitectGallery> $architectGallery
 * @property-read int|null $architect_gallery_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \App\Models\Seller|null $seller
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerAward> $sellerAwards
 * @property-read int|null $seller_awards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerCertificate> $sellerCertificates
 * @property-read int|null $seller_certificates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerDomain> $sellerDomains
 * @property-read int|null $seller_domains_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerEnquiry> $sellerEnquiries
 * @property-read int|null $seller_enquiries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerGallery> $sellerGallery
 * @property-read int|null $seller_gallery_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SellerSubcategory> $sellerSubcategories
 * @property-read int|null $seller_subcategories_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAppToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereChangeLogRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereWebToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

