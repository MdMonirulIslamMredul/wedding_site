<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Domains\Announcement\Models{
/**
 * Class Announcement.
 *
 * @property int $id
 * @property string|null $area
 * @property string $type
 * @property string $message
 * @property bool $enabled
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement enabled()
 * @method static \Database\Factories\AnnouncementFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement forArea($area)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement inTimeFrame()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement whereUpdatedAt($value)
 */
	class Announcement extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class PasswordHistory.
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordHistory whereUpdatedAt($value)
 */
	class PasswordHistory extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class Permission.
 *
 * @property int $id
 * @property string $type
 * @property string $guard_name
 * @property string $name
 * @property string|null $description
 * @property int|null $parent_id
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $children
 * @property-read int|null $children_count
 * @property-read Permission|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission isChild()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission isMaster()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission isParent()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission singular()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class Role.
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $permissions_label
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\RoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Domains\Auth\Models{
/**
 * Class User.
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string|null $phone
 * @property string|null $email
 * @property int|null $shipping_id
 * @property int|null $billing_id
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property \Illuminate\Support\Carbon|null $password_changed_at
 * @property bool $active
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property bool $to_be_logged_out
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $avatar
 * @property-read string $permissions_label
 * @property-read string $roles_label
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\PasswordHistory[] $passwordHistories
 * @property-read int|null $password_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \DarkGhostHunter\Laraguard\Eloquent\TwoFactorAuthentication $twoFactorAuth
 * @method static \Illuminate\Database\Eloquent\Builder|User admins()
 * @method static \Illuminate\Database\Eloquent\Builder|User allAccess()
 * @method static \Illuminate\Database\Eloquent\Builder|User byType($type)
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyActive()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyDeactivated()
 * @method static \Illuminate\Database\Query\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|User users()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBillingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswordChangedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereShippingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToBeLoggedOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \DarkGhostHunter\Laraguard\Contracts\TwoFactorAuthenticatable {}
}

namespace App\Domains\Contacts\Models{
/**
 * App\Domains\Contacts\Models\Contact
 *
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Query\Builder|Contact onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Query\Builder|Contact withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Contact withoutTrashed()
 */
	class Contact extends \Eloquent {}
}

namespace App\Domains\Page\Models{
/**
 * App\Domains\Page\Models\Page
 *
 * @property int $id
 * @property string|null $title
 * @property string $slug
 * @property string|null $bgcolor
 * @property string|null $image
 * @property string|null $description
 * @property string|null $description_a
 * @property string|null $description_b
 * @property string|null $description_c
 * @property int|null $hearder
 * @property int|null $footer_left
 * @property int|null $footer_right
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereBgcolor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescriptionA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescriptionB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescriptionC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereFooterLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereFooterRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereHearder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Brand
 *
 * @property int $id
 * @property int|null $is_active
 * @property string|null $title
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Query\Builder|Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Brand withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Brand withoutTrashed()
 */
	class Brand extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Product
 *
 * @property int $id
 * @property string|null $active
 * @property string|null $productName
 * @property int|null $status_id
 * @property int|null $warehouse_id
 * @property string|null $invoice
 * @property int|null $user_id
 * @property float|null $shipping_cost
 * @property int|null $shipping_id
 * @property string|null $barcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInvoice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShippingCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShippingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWarehouseId($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Shipping
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Products\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shipping whereUserId($value)
 */
	class Shipping extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Status
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Products\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Query\Builder|Status onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Status withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Status withoutTrashed()
 */
	class Status extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\SubSubCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SubSubCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubSubCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubSubCategory query()
 */
	class SubSubCategory extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Unit
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 */
	class Unit extends \Eloquent {}
}

namespace App\Domains\Products\Models{
/**
 * App\Domains\Products\Models\Warehouse
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Products\Models\Product[] $products
 * @property-read int|null $products_count
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse newQuery()
 * @method static \Illuminate\Database\Query\Builder|Warehouse onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Warehouse whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Warehouse withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Warehouse withoutTrashed()
 */
	class Warehouse extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\About
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $short_description
 * @property string|null $banner_img
 * @property string|null $about_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $description
 * @method static \Illuminate\Database\Eloquent\Builder|About newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|About query()
 * @method static \Illuminate\Database\Eloquent\Builder|About whereAboutImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereBannerImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|About whereUpdatedAt($value)
 */
	class About extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Activity
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property string|null $title
 * @property string|null $sort_para
 * @property int|null $is_active
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSortPara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 */
	class Activity extends \Eloquent {}
}

namespace App\Models\Api{
/**
 * App\Models\Api\ApiCall
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiCall query()
 */
	class ApiCall extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string|null $car_model
 * @property string $date
 * @property string $time
 * @property string|null $service_type
 * @property string|null $note
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCarModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereServiceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 */
	class Appointment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blog
 *
 * @property int $id
 * @property string|null $banner
 * @property string|null $title
 * @property string|null $short_details
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $details1
 * @property string|null $details2
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog query()
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDetails1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereDetails2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereShortDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Blog whereUpdatedAt($value)
 */
	class Blog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property int|null $is_active
 * @property string|null $title
 * @property string|null $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Committee
 *
 * @property int $id
 * @property int|null $type_id
 * @property string|null $name
 * @property string|null $position
 * @property string|null $details
 * @property string|null $section
 * @property string|null $description
 * @property int $has_description
 * @property int|null $serial
 * @property string|null $photo
 * @property string|null $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Committee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Committee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Committee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereHasDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Committee whereUpdatedAt($value)
 */
	class Committee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CommitteeType
 *
 * @property int $id
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommitteeType whereUpdatedAt($value)
 */
	class CommitteeType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Competition
 *
 * @property int $id
 * @property int|null $year_id
 * @property int|null $type_id
 * @property string|null $date
 * @property string|null $title
 * @property string|null $address
 * @property string|null $result_file
 * @property string|null $banner_image
 * @property string|null $description1
 * @property string|null $description2
 * @property string|null $description3
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Competition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Competition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Competition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereBannerImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereDescription1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereDescription2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereDescription3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereResultFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competition whereYearId($value)
 */
	class Competition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompetitionType
 *
 * @property int $id
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionType whereUpdatedAt($value)
 */
	class CompetitionType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CompetitionYear
 *
 * @property int $id
 * @property string|null $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompetitionYear whereYear($value)
 */
	class CompetitionYear extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string|null $message
 * @property string|null $course
 * @property string|null $country
 * @property string|null $qualification
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models\Content{
/**
 * App\Models\Content\Setting
 *
 * @property int $id
 * @property string $active
 * @property string $key
 * @property string|null $value
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Domains\Auth\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \App\Domains\Auth\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Donate
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $title
 * @property string|null $color
 * @property string|null $link
 * @property int|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Donate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donate whereUpdatedAt($value)
 */
	class Donate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $sort_para
 * @property string|null $image
 * @property string|null $description
 * @property string $date
 * @property int $status
 * @property string|null $organized_by
 * @property string|null $start
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $venue
 * @property string|null $facility
 * @property string|null $map
 * @property string|null $eventMission
 * @property string|null $eventVission
 * @property string|null $event_title_1
 * @property string|null $event_title_2
 * @property string|null $event_title_3
 * @property string|null $ourVission
 * @property string|null $single_event_banner
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventMission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventTitle1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventTitle2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventTitle3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventVission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereFacility($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereMap($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOrganizedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereOurVission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSingleEventBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSortPara($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereVenue($value)
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property string|null $question
 * @property string|null $answer
 * @property string|null $page_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property int|null $competition_id
 * @property string|null $banner
 * @property string|null $photos
 * @property string|null $details
 * @property string|null $image
 * @property int|null $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCompetitionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\History
 *
 * @property int $id
 * @property string|null $banner_image
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $image4
 * @property string|null $image5
 * @property string|null $image6
 * @property string|null $description1
 * @property string|null $description2
 * @property string|null $description3
 * @property string|null $description4
 * @property string|null $description5
 * @property string|null $description6
 * @property string|null $link
 * @property string|null $section
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History query()
 * @method static \Illuminate\Database\Eloquent\Builder|History whereBannerImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereDescription1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereDescription2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereDescription3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereDescription4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereDescription5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereDescription6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereImage4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereImage5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereImage6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereUpdatedAt($value)
 */
	class History extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Info
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $link
 * @property string|null $image
 * @property string $description
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUpdatedAt($value)
 */
	class Info extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mission
 *
 * @property int $id
 * @property string|null $mission_vision
 * @property string|null $text
 * @property string|null $pdf_file
 * @property string|null $portfolio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mission whereMissionVision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mission wherePdfFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mission wherePortfolio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mission whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mission whereUpdatedAt($value)
 */
	class Mission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notice
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $link
 * @property string|null $image
 * @property string|null $description
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notice whereUpdatedAt($value)
 */
	class Notice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string|null $title
 * @property string $slug
 * @property string|null $bgcolor
 * @property string|null $image
 * @property string|null $description
 * @property string|null $description_a
 * @property string|null $description_b
 * @property string|null $description_c
 * @property int|null $hearder
 * @property int|null $footer_left
 * @property int|null $footer_right
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereBgcolor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescriptionA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescriptionB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescriptionC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereFooterLeft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereFooterRight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereHearder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string|null $banner
 * @property string|null $image
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $title
 * @property string|null $details_title
 * @property string|null $details_description
 * @property string|null $details_description2
 * @property string|null $short_details
 * @property string|null $details
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDetailsDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDetailsDescription2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDetailsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereShortDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ServicArea
 *
 * @property int $id
 * @property string $areaname
 * @property string|null $image
 * @property string|null $description
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea query()
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereAreaname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ServicArea whereUpdatedAt($value)
 */
	class ServicArea extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $banner
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property int $is_active
 * @property string|null $details1
 * @property string|null $details2
 * @property string|null $details3
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDetails1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDetails2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDetails3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $header_title
 * @property string|null $bottom_title
 * @property string|null $details
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereBottomTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereHeaderTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sponsor
 *
 * @property int $id
 * @property int|null $event_id
 * @property int|null $sponsor_id
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereSponsorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sponsor whereUpdatedAt($value)
 */
	class Sponsor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $image
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $banner
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Testmony
 *
 * @property int $id
 * @property string|null $reviewer
 * @property string|null $photo
 * @property string|null $reviewer_job
 * @property string|null $review
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony query()
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereReviewer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereReviewerJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Testmony whereUpdatedAt($value)
 */
	class Testmony extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\University
 *
 * @property int $id
 * @property string|null $banner
 * @property string|null $university_name
 * @property string|null $website
 * @property int|null $study_destination_id
 * @property string|null $logo
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $details1
 * @property string|null $details2
 * @property string|null $details3
 * @property string $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|University newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|University newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|University query()
 * @method static \Illuminate\Database\Eloquent\Builder|University whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDetails1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDetails2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereDetails3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereStudyDestinationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUniversityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|University whereWebsite($value)
 */
	class University extends \Eloquent {}
}

