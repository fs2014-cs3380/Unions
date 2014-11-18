<?php

/**
 * Soap client for EMS API
 *
 */
class GetAPIVersion
{
}

class GetAPIVersionResponse
{
    public $GetAPIVersionResult; //string;
}

class GetAllBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $BuildingID; //int;
    public $ViewComboRoomComponents; //boolean;
}

class GetAllBookingsResponse
{
    public $GetAllBookingsResult; //string;
}

class GetBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $Buildings; //ArrayOfInt;
    public $Statuses; //ArrayOfInt;
    public $EventTypes; //ArrayOfInt;
    public $GroupTypes; //ArrayOfInt;
    public $ViewComboRoomComponents; //boolean;
}

class ArrayOfInt
{
    public $int; //int;
}

class GetBookingsResponse
{
    public $GetBookingsResult; //string;
}

class GetHVACBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $Buildings; //ArrayOfInt;
    public $Statuses; //ArrayOfInt;
    public $EventTypes; //ArrayOfInt;
    public $GroupTypes; //ArrayOfInt;
    public $HVACZones; //ArrayOfString;
    public $ViewComboRoomComponents; //boolean;
}

class ArrayOfString
{
    public $string; //string;
}

class GetHVACBookingsResponse
{
    public $GetHVACBookingsResult; //string;
}

class GetChangedBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $Rooms; //ArrayOfInt;
    public $Statuses; //ArrayOfInt;
    public $EventTypes; //ArrayOfInt;
    public $GroupTypes; //ArrayOfInt;
    public $ViewComboRoomComponents; //boolean;
}

class GetChangedBookingsResponse
{
    public $GetChangedBookingsResult; //string;
}

class GetAllRoomBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $RoomID; //int;
    public $ViewComboRoomComponents; //boolean;
}

class GetAllRoomBookingsResponse
{
    public $GetAllRoomBookingsResult; //string;
}

class GetRoomBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $RoomID; //int;
    public $Statuses; //ArrayOfInt;
    public $EventTypes; //ArrayOfInt;
    public $GroupTypes; //ArrayOfInt;
    public $ViewComboRoomComponents; //boolean;
}

class GetRoomBookingsResponse
{
    public $GetRoomBookingsResult; //string;
}

class GetWebUserBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $WebUserID; //int;
    public $Statuses; //ArrayOfInt;
    public $StatusTypes; //ArrayOfInt;
    public $ViewComboRoomComponents; //boolean;
}

class GetWebUserBookingsResponse
{
    public $GetWebUserBookingsResult; //string;
}

class GetRoomDetails extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $RoomID; //int;
}

class GetRoomDetailsResponse
{
    public $GetRoomDetailsResult; //string;
}

class GetComboRoomComponents extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $RoomID; //int;
}

class GetComboRoomComponentsResponse
{
    public $GetComboRoomComponentsResult; //string;
}

class GetAllRooms extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BuildingID; //int;
}

class GetAllRoomsResponse
{
    public $GetAllRoomsResult; //string;
}

class GetAllComboRoomComponents extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetAllComboRoomComponentsResponse
{
    public $GetAllComboRoomComponentsResult; //string;
}

class GetRooms extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $Buildings; //ArrayOfInt;
}

class GetRoomsResponse
{
    public $GetRoomsResult; //string;
}

class GetRoomsBySetupType extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BuildingID; //int;
    public $RoomTypeID; //int;
    public $FloorID; //int;
    public $SetupTypeID; //int;
}

class GetRoomsBySetupTypeResponse
{
    public $GetRoomsBySetupTypeResult; //string;
}

class GetBuildings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetBuildingsResponse
{
    public $GetBuildingsResult; //string;
}

class GetAreas extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $AreaID; //int;
}

class GetAreasResponse
{
    public $GetAreasResult; //string;
}

class GetStatuses extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetStatusesResponse
{
    public $GetStatusesResult; //string;
}

class GetEventTypes extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetEventTypesResponse
{
    public $GetEventTypesResult; //string;
}

class GetSetupTypes extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetSetupTypesResponse
{
    public $GetSetupTypesResult; //string;
}

class GetGroupTypes extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetGroupTypesResponse
{
    public $GetGroupTypesResult; //string;
}

class GetRoomTypesByWPT extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebProcessTemplates; //ArrayOfInt;
    public $Buildings; //ArrayOfInt;
}

class GetRoomTypesByWPTResponse
{
    public $GetRoomTypesByWPTResult; //string;
}

class AddReservation extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
    public $RoomID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
    public $EventName; //string;
    public $StatusID; //int;
}

class AddReservationResponse
{
    public $AddReservationResult; //string;
}

class AddReservation2 extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
    public $RoomID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
    public $EventName; //string;
    public $StatusID; //int;
    public $EventTypeID; //int;
    public $WebUserID; //int;
    public $WebTemplateID; //int;
}

class AddReservation2Response
{
    public $AddReservation2Result; //string;
}

class AddReservation3 extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
    public $RoomID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
    public $EventName; //string;
    public $StatusID; //int;
    public $EventTypeID; //int;
    public $WebUserID; //int;
    public $WebTemplateID; //int;
    public $ReservationSourceID; //int;
}

class AddReservation3Response
{
    public $AddReservation3Result; //string;
}

class AddWebRequest extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $EventName; //string;
    public $EventTypeID; //int;
    public $GroupName; //string;
    public $Contact; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $EmailAddress; //string;
    public $WebUserID; //int;
    public $BuildingID; //int;
    public $RoomID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
    public $SetupTypeID; //int;
    public $SetupCount; //int;
    public $Notes; //string;
}

class AddWebRequestResponse
{
    public $AddWebRequestResult; //string;
}

class AddGroup extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupName; //string;
    public $GroupTypeID; //int;
    public $Address1; //string;
    public $Address2; //string;
    public $City; //string;
    public $State; //string;
    public $ZipCode; //string;
    public $Country; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $EmailAddress; //string;
    public $ExternalReference; //string;
}

class AddGroupResponse
{
    public $AddGroupResult; //string;
}

class GetGroupDetails extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
}

class GetGroupDetailsResponse
{
    public $GetGroupDetailsResult; //string;
}

class UpdateGroup extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
    public $GroupName; //string;
    public $GroupTypeID; //int;
    public $Address1; //string;
    public $Address2; //string;
    public $City; //string;
    public $State; //string;
    public $ZipCode; //string;
    public $Country; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $EmailAddress; //string;
    public $ExternalReference; //string;
    public $Active; //boolean;
}

class UpdateGroupResponse
{
    public $UpdateGroupResult; //string;
}

class AddContact extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
    public $ContactName; //string;
    public $Title; //string;
    public $Address1; //string;
    public $Address2; //string;
    public $City; //string;
    public $State; //string;
    public $ZipCode; //string;
    public $Country; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $EmailAddress; //string;
    public $ExternalReference; //string;
}

class AddContactResponse
{
    public $AddContactResult; //string;
}

class GetContactDetails extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $ContactID; //int;
}

class GetContactDetailsResponse
{
    public $GetContactDetailsResult; //string;
}

class UpdateContact extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $ContactID; //int;
    public $ContactName; //string;
    public $Title; //string;
    public $Address1; //string;
    public $Address2; //string;
    public $City; //string;
    public $State; //string;
    public $ZipCode; //string;
    public $Country; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $EmailAddress; //string;
    public $ExternalReference; //string;
    public $Active; //boolean;
}

class UpdateContactResponse
{
    public $UpdateContactResult; //string;
}

class AddWebUser extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserName; //string;
    public $WebUserPassword; //string;
    public $EmailAddress; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $ExternalReference; //string;
    public $NetworkID; //string;
    public $TimeZoneID; //int;
    public $StatusID; //int;
    public $WebSecurityTemplateID; //int;
    public $WebProcessTemplates; //ArrayOfInt;
    public $Groups; //ArrayOfInt;
}

class AddWebUserResponse
{
    public $AddWebUserResult; //string;
}

class GetWebUserDetails extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserID; //int;
}

class GetWebUserDetailsResponse
{
    public $GetWebUserDetailsResult; //string;
}

class UpdateWebUser extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserID; //int;
    public $WebUserName; //string;
    public $EmailAddress; //string;
    public $Phone; //string;
    public $Fax; //string;
    public $ExternalReference; //string;
    public $NetworkID; //string;
    public $TimeZoneID; //int;
    public $StatusID; //int;
    public $WebSecurityTemplateID; //int;
    public $WebProcessTemplates; //ArrayOfInt;
    public $Groups; //ArrayOfInt;
}

class UpdateWebUserResponse
{
    public $UpdateWebUserResult; //string;
}

class GetWebUserWebProcessTemplates extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserID; //int;
}

class GetWebUserWebProcessTemplatesResponse
{
    public $GetWebUserWebProcessTemplatesResult; //string;
}

class UpdateBooking extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BookingID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
    public $StatusID; //int;
    public $RoomID; //int;
}

class UpdateBookingResponse
{
    public $UpdateBookingResult; //string;
}

class UpdateBooking2 extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BookingID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
    public $StatusID; //int;
    public $RoomID; //int;
    public $EventName; //string;
}

class UpdateBooking2Response
{
    public $UpdateBooking2Result; //string;
}

class GetRoomAvailability extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $RoomID; //int;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
}

class GetRoomAvailabilityResponse
{
    public $GetRoomAvailabilityResult; //string;
}

class GetRoomsAvailable extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BookingDate; //dateTime;
    public $BuildingID; //int;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
}

class GetRoomsAvailableResponse
{
    public $GetRoomsAvailableResult; //string;
}

class GetRoomsAvailable2 extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BuildingID; //int;
    public $RoomTypeID; //int;
    public $FloorID; //int;
    public $WebProcessTemplates; //ArrayOfInt;
    public $BookingDate; //dateTime;
    public $StartTime; //dateTime;
    public $EndTime; //dateTime;
}

class GetRoomsAvailable2Response
{
    public $GetRoomsAvailable2Result; //string;
}

class GetBooking extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $BookingID; //int;
}

class GetBookingResponse
{
    public $GetBookingResult; //string;
}

class GetGroups extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupName; //string;
    public $EmailAddress; //string;
}

class GetGroupsResponse
{
    public $GetGroupsResult; //string;
}

class GetWebUsers extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserName; //string;
    public $EmailAddress; //string;
    public $ExternalReference; //string;
    public $NetworkID; //string;
}

class GetWebUsersResponse
{
    public $GetWebUsersResult; //string;
}

class GetWebTemplates extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetWebTemplatesResponse
{
    public $GetWebTemplatesResult; //string;
}

class AddPayment extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $TransactionDate; //dateTime;
    public $PaymentTypeID; //int;
    public $CheckNo; //string;
    public $PaymentAmount; //decimal;
    public $InvoiceNo; //string;
    public $Notes; //string;
}

class AddPaymentResponse
{
    public $AddPaymentResult; //string;
}

class UpdateCheckInStatus extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $CheckIn; //boolean;
    public $GroupID; //int;
    public $BuildingID; //int;
    public $CheckInOutDate; //dateTime;
}

class UpdateCheckInStatusResponse
{
    public $UpdateCheckInStatusResult; //string;
}

class GetCheckInStatus extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $CheckInDate; //dateTime;
    public $Groups; //ArrayOfInt;
}

class GetCheckInStatusResponse
{
    public $GetCheckInStatusResult; //string;
}

class GetCourseBookings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $Buildings; //ArrayOfInt;
    public $Statuses; //ArrayOfInt;
    public $EventTypes; //ArrayOfInt;
    public $ViewComboRoomComponents; //boolean;
}

class GetCourseBookingsResponse
{
    public $GetCourseBookingsResult; //string;
}

class GetServiceOrderDetails extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $Buildings; //ArrayOfInt;
    public $Statuses; //ArrayOfInt;
}

class GetServiceOrderDetailsResponse
{
    public $GetServiceOrderDetailsResult; //string;
}

class GetServiceOrderDetails2 extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
    public $Buildings; //ArrayOfInt;
    public $Statuses; //ArrayOfInt;
}

class GetServiceOrderDetails2Response
{
    public $GetServiceOrderDetails2Result; //string;
}

class GetWebSecurityTemplateRoles extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebSecurityTemplateID; //int;
}

class GetWebSecurityTemplateRolesResponse
{
    public $GetWebSecurityTemplateRolesResult; //string;
}

class GetWebProcessTemplateSettings extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebProcessTemplateID; //int;
}

class GetWebProcessTemplateSettingsResponse
{
    public $GetWebProcessTemplateSettingsResult; //string;
}

class GetBuildingHours extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $Buildings; //ArrayOfInt;
    public $BuildingHoursDate; //dateTime;
}

class GetBuildingHoursResponse
{
    public $GetBuildingHoursResult; //string;
}

class GetBuildingHolidays extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $Buildings; //ArrayOfInt;
    public $HolidayDate; //dateTime;
}

class GetBuildingHolidaysResponse
{
    public $GetBuildingHolidaysResult; //string;
}

class GetWebProcessTemplateCategories extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebProcessTemplateID; //int;
}

class GetWebProcessTemplateCategoriesResponse
{
    public $GetWebProcessTemplateCategoriesResult; //string;
}

class GetWebUserOptions extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserID; //int;
}

class GetWebUserOptionsResponse
{
    public $GetWebUserOptionsResult; //string;
}

class UpdateWebUserOptions extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $WebUserID; //int;
    public $WebProcessTemplateID; //int;
    public $OptionName; //string;
    public $OptionValue; //string;
}

class UpdateWebUserOptionsResponse
{
    public $UpdateWebUserOptionsResult; //string;
}

class GetReservationSources extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
}

class GetReservationSourcesResponse
{
    public $GetReservationSourcesResult; //string;
}

class GetContacts extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
}

class GetContactsResponse
{
    public $GetContactsResult; //string;
}

class GetGroupReservations extends EmsApi
{
    protected $username; //string;
    protected $password; //string;
    public $GroupID; //int;
    public $StartDate; //dateTime;
    public $EndDate; //dateTime;
}

class GetGroupReservationsResponse extends EmsApi
{
    public $GetGroupReservationsResult; //string;
}

/**
 * The soap client proxy class
 */
class EmsApi
{
    public $soapClient;
    protected $username = 'API';
    protected $password = 'APITEST';

    private static $classmap = array(
        'GetAPIVersion' => 'GetAPIVersion',
        'GetAPIVersionResponse' => 'GetAPIVersionResponse',
        'GetAllBookings' => 'GetAllBookings',
        'GetAllBookingsResponse' => 'GetAllBookingsResponse',
        'GetBookings' => 'GetBookings',
        'ArrayOfInt' => 'ArrayOfInt',
        'GetBookingsResponse' => 'GetBookingsResponse',
        'GetHVACBookings' => 'GetHVACBookings',
        'ArrayOfString' => 'ArrayOfString',
        'GetHVACBookingsResponse' => 'GetHVACBookingsResponse',
        'GetChangedBookings' => 'GetChangedBookings',
        'GetChangedBookingsResponse' => 'GetChangedBookingsResponse',
        'GetAllRoomBookings' => 'GetAllRoomBookings',
        'GetAllRoomBookingsResponse' => 'GetAllRoomBookingsResponse',
        'GetRoomBookings' => 'GetRoomBookings',
        'GetRoomBookingsResponse' => 'GetRoomBookingsResponse',
        'GetWebUserBookings' => 'GetWebUserBookings',
        'GetWebUserBookingsResponse' => 'GetWebUserBookingsResponse',
        'GetRoomDetails' => 'GetRoomDetails',
        'GetRoomDetailsResponse' => 'GetRoomDetailsResponse',
        'GetComboRoomComponents' => 'GetComboRoomComponents',
        'GetComboRoomComponentsResponse' => 'GetComboRoomComponentsResponse',
        'GetAllRooms' => 'GetAllRooms',
        'GetAllRoomsResponse' => 'GetAllRoomsResponse',
        'GetAllComboRoomComponents' => 'GetAllComboRoomComponents',
        'GetAllComboRoomComponentsResponse' => 'GetAllComboRoomComponentsResponse',
        'GetRooms' => 'GetRooms',
        'GetRoomsResponse' => 'GetRoomsResponse',
        'GetRoomsBySetupType' => 'GetRoomsBySetupType',
        'GetRoomsBySetupTypeResponse' => 'GetRoomsBySetupTypeResponse',
        'GetBuildings' => 'GetBuildings',
        'GetBuildingsResponse' => 'GetBuildingsResponse',
        'GetAreas' => 'GetAreas',
        'GetAreasResponse' => 'GetAreasResponse',
        'GetStatuses' => 'GetStatuses',
        'GetStatusesResponse' => 'GetStatusesResponse',
        'GetEventTypes' => 'GetEventTypes',
        'GetEventTypesResponse' => 'GetEventTypesResponse',
        'GetSetupTypes' => 'GetSetupTypes',
        'GetSetupTypesResponse' => 'GetSetupTypesResponse',
        'GetGroupTypes' => 'GetGroupTypes',
        'GetGroupTypesResponse' => 'GetGroupTypesResponse',
        'GetRoomTypesByWPT' => 'GetRoomTypesByWPT',
        'GetRoomTypesByWPTResponse' => 'GetRoomTypesByWPTResponse',
        'AddReservation' => 'AddReservation',
        'AddReservationResponse' => 'AddReservationResponse',
        'AddReservation2' => 'AddReservation2',
        'AddReservation2Response' => 'AddReservation2Response',
        'AddReservation3' => 'AddReservation3',
        'AddReservation3Response' => 'AddReservation3Response',
        'AddWebRequest' => 'AddWebRequest',
        'AddWebRequestResponse' => 'AddWebRequestResponse',
        'AddGroup' => 'AddGroup',
        'AddGroupResponse' => 'AddGroupResponse',
        'GetGroupDetails' => 'GetGroupDetails',
        'GetGroupDetailsResponse' => 'GetGroupDetailsResponse',
        'UpdateGroup' => 'UpdateGroup',
        'UpdateGroupResponse' => 'UpdateGroupResponse',
        'AddContact' => 'AddContact',
        'AddContactResponse' => 'AddContactResponse',
        'GetContactDetails' => 'GetContactDetails',
        'GetContactDetailsResponse' => 'GetContactDetailsResponse',
        'UpdateContact' => 'UpdateContact',
        'UpdateContactResponse' => 'UpdateContactResponse',
        'AddWebUser' => 'AddWebUser',
        'AddWebUserResponse' => 'AddWebUserResponse',
        'GetWebUserDetails' => 'GetWebUserDetails',
        'GetWebUserDetailsResponse' => 'GetWebUserDetailsResponse',
        'UpdateWebUser' => 'UpdateWebUser',
        'UpdateWebUserResponse' => 'UpdateWebUserResponse',
        'GetWebUserWebProcessTemplates' => 'GetWebUserWebProcessTemplates',
        'GetWebUserWebProcessTemplatesResponse' => 'GetWebUserWebProcessTemplatesResponse',
        'UpdateBooking' => 'UpdateBooking',
        'UpdateBookingResponse' => 'UpdateBookingResponse',
        'UpdateBooking2' => 'UpdateBooking2',
        'UpdateBooking2Response' => 'UpdateBooking2Response',
        'GetRoomAvailability' => 'GetRoomAvailability',
        'GetRoomAvailabilityResponse' => 'GetRoomAvailabilityResponse',
        'GetRoomsAvailable' => 'GetRoomsAvailable',
        'GetRoomsAvailableResponse' => 'GetRoomsAvailableResponse',
        'GetRoomsAvailable2' => 'GetRoomsAvailable2',
        'GetRoomsAvailable2Response' => 'GetRoomsAvailable2Response',
        'GetBooking' => 'GetBooking',
        'GetBookingResponse' => 'GetBookingResponse',
        'GetGroups' => 'GetGroups',
        'GetGroupsResponse' => 'GetGroupsResponse',
        'GetWebUsers' => 'GetWebUsers',
        'GetWebUsersResponse' => 'GetWebUsersResponse',
        'GetWebTemplates' => 'GetWebTemplates',
        'GetWebTemplatesResponse' => 'GetWebTemplatesResponse',
        'AddPayment' => 'AddPayment',
        'AddPaymentResponse' => 'AddPaymentResponse',
        'UpdateCheckInStatus' => 'UpdateCheckInStatus',
        'UpdateCheckInStatusResponse' => 'UpdateCheckInStatusResponse',
        'GetCheckInStatus' => 'GetCheckInStatus',
        'GetCheckInStatusResponse' => 'GetCheckInStatusResponse',
        'GetCourseBookings' => 'GetCourseBookings',
        'GetCourseBookingsResponse' => 'GetCourseBookingsResponse',
        'GetServiceOrderDetails' => 'GetServiceOrderDetails',
        'GetServiceOrderDetailsResponse' => 'GetServiceOrderDetailsResponse',
        'GetServiceOrderDetails2' => 'GetServiceOrderDetails2',
        'GetServiceOrderDetails2Response' => 'GetServiceOrderDetails2Response',
        'GetWebSecurityTemplateRoles' => 'GetWebSecurityTemplateRoles',
        'GetWebSecurityTemplateRolesResponse' => 'GetWebSecurityTemplateRolesResponse',
        'GetWebProcessTemplateSettings' => 'GetWebProcessTemplateSettings',
        'GetWebProcessTemplateSettingsResponse' => 'GetWebProcessTemplateSettingsResponse',
        'GetBuildingHours' => 'GetBuildingHours',
        'GetBuildingHoursResponse' => 'GetBuildingHoursResponse',
        'GetBuildingHolidays' => 'GetBuildingHolidays',
        'GetBuildingHolidaysResponse' => 'GetBuildingHolidaysResponse',
        'GetWebProcessTemplateCategories' => 'GetWebProcessTemplateCategories',
        'GetWebProcessTemplateCategoriesResponse' => 'GetWebProcessTemplateCategoriesResponse',
        'GetWebUserOptions' => 'GetWebUserOptions',
        'GetWebUserOptionsResponse' => 'GetWebUserOptionsResponse',
        'UpdateWebUserOptions' => 'UpdateWebUserOptions',
        'UpdateWebUserOptionsResponse' => 'UpdateWebUserOptionsResponse',
        'GetReservationSources' => 'GetReservationSources',
        'GetReservationSourcesResponse' => 'GetReservationSourcesResponse',
        'GetContacts' => 'GetContacts',
        'GetContactsResponse' => 'GetContactsResponse',
        'GetGroupReservations' => 'GetGroupReservations',
        'GetGroupReservationsResponse' => 'GetGroupReservationsResponse',

    );

    function __construct($url = 'http://ems.missouri.edu/API/Service.asmx?wsdl')
    {
        $this->soapClient = new SoapClient($url, array("classmap" => self::$classmap, "trace" => true, "exceptions" => true));
    }


    function GetAPIVersion($GetAPIVersion)
    {
        $GetAPIVersionResponse = $this->soapClient->GetAPIVersion($GetAPIVersion);
        return $GetAPIVersionResponse;
    }

    function GetAllBookings($GetAllBookings)
    {
        $GetAllBookingsResponse = $this->soapClient->GetAllBookings($GetAllBookings);
        return $GetAllBookingsResponse;
    }

    function GetBookings($GetBookings)
    {
        $GetBookingsResponse = $this->soapClient->GetBookings($GetBookings);
        return $GetBookingsResponse;
    }

    function GetHVACBookings($GetHVACBookings)
    {
        $GetHVACBookingsResponse = $this->soapClient->GetHVACBookings($GetHVACBookings);
        return $GetHVACBookingsResponse;
    }

    function GetChangedBookings($GetChangedBookings)
    {
        $GetChangedBookingsResponse = $this->soapClient->GetChangedBookings($GetChangedBookings);
        return $GetChangedBookingsResponse;
    }

    function GetAllRoomBookings($GetAllRoomBookings)
    {
        $GetAllRoomBookingsResponse = $this->soapClient->GetAllRoomBookings($GetAllRoomBookings);
        return $GetAllRoomBookingsResponse;
    }

    function GetRoomBookings($GetRoomBookings)
    {
        $GetRoomBookingsResponse = $this->soapClient->GetRoomBookings($GetRoomBookings);
        return $GetRoomBookingsResponse;
    }

    function GetWebUserBookings($GetWebUserBookings)
    {
        $GetWebUserBookingsResponse = $this->soapClient->GetWebUserBookings($GetWebUserBookings);
        return $GetWebUserBookingsResponse;
    }

    function GetRoomDetails($GetRoomDetails)
    {
        $GetRoomDetailsResponse = $this->soapClient->GetRoomDetails($GetRoomDetails);
        return $GetRoomDetailsResponse;
    }

    function GetComboRoomComponents($GetComboRoomComponents)
    {
        $GetComboRoomComponentsResponse = $this->soapClient->GetComboRoomComponents($GetComboRoomComponents);
        return $GetComboRoomComponentsResponse;
    }

    function GetAllRooms($GetAllRooms)
    {
        $GetAllRoomsResponse = $this->soapClient->GetAllRooms($GetAllRooms);
        return $GetAllRoomsResponse;
    }

    function GetAllComboRoomComponents($GetAllComboRoomComponents)
    {
        $GetAllComboRoomComponentsResponse = $this->soapClient->GetAllComboRoomComponents($GetAllComboRoomComponents);
        return $GetAllComboRoomComponentsResponse;
    }

    function GetRooms($GetRooms)
    {
        $GetRoomsResponse = $this->soapClient->GetRooms($GetRooms);
        return $GetRoomsResponse;
    }

    function GetRoomsBySetupType($GetRoomsBySetupType)
    {
        $GetRoomsBySetupTypeResponse = $this->soapClient->GetRoomsBySetupType($GetRoomsBySetupType);
        return $GetRoomsBySetupTypeResponse;
    }

    function GetBuildings($GetBuildings)
    {
        $GetBuildingsResponse = $this->soapClient->GetBuildings($GetBuildings);
        return $GetBuildingsResponse;
    }

    function GetAreas($GetAreas)
    {
        $GetAreasResponse = $this->soapClient->GetAreas($GetAreas);
        return $GetAreasResponse;
    }

    function GetStatuses($GetStatuses)
    {
        $GetStatusesResponse = $this->soapClient->GetStatuses($GetStatuses);
        return $GetStatusesResponse;
    }

    function GetEventTypes($GetEventTypes)
    {
        $GetEventTypesResponse = $this->soapClient->GetEventTypes($GetEventTypes);
        return $GetEventTypesResponse;
    }

    function GetSetupTypes($GetSetupTypes)
    {
        $GetSetupTypesResponse = $this->soapClient->GetSetupTypes($GetSetupTypes);
        return $GetSetupTypesResponse;
    }

    function GetGroupTypes($GetGroupTypes)
    {
        $GetGroupTypesResponse = $this->soapClient->GetGroupTypes($GetGroupTypes);
        return $GetGroupTypesResponse;
    }

    function GetRoomTypesByWPT($GetRoomTypesByWPT)
    {
        $GetRoomTypesByWPTResponse = $this->soapClient->GetRoomTypesByWPT($GetRoomTypesByWPT);
        return $GetRoomTypesByWPTResponse;
    }

    function AddReservation($AddReservation)
    {
        $AddReservationResponse = $this->soapClient->AddReservation($AddReservation);
        return $AddReservationResponse;
    }

    function AddReservation2($AddReservation2)
    {
        $AddReservation2Response = $this->soapClient->AddReservation2($AddReservation2);
        return $AddReservation2Response;
    }

    function AddReservation3($AddReservation3)
    {
        $AddReservation3Response = $this->soapClient->AddReservation3($AddReservation3);
        return $AddReservation3Response;
    }

    function AddWebRequest($AddWebRequest)
    {
        $AddWebRequestResponse = $this->soapClient->AddWebRequest($AddWebRequest);
        return $AddWebRequestResponse;
    }

    function AddGroup($AddGroup)
    {
        $AddGroupResponse = $this->soapClient->AddGroup($AddGroup);
        return $AddGroupResponse;
    }

    function GetGroupDetails($GetGroupDetails)
    {
        $GetGroupDetailsResponse = $this->soapClient->GetGroupDetails($GetGroupDetails);
        return $GetGroupDetailsResponse;
    }

    function UpdateGroup($UpdateGroup)
    {
        $UpdateGroupResponse = $this->soapClient->UpdateGroup($UpdateGroup);
        return $UpdateGroupResponse;
    }

    function AddContact($AddContact)
    {
        $AddContactResponse = $this->soapClient->AddContact($AddContact);
        return $AddContactResponse;
    }

    function GetContactDetails($GetContactDetails)
    {
        $GetContactDetailsResponse = $this->soapClient->GetContactDetails($GetContactDetails);
        return $GetContactDetailsResponse;
    }

    function UpdateContact($UpdateContact)
    {
        $UpdateContactResponse = $this->soapClient->UpdateContact($UpdateContact);
        return $UpdateContactResponse;
    }

    function AddWebUser($AddWebUser)
    {
        $AddWebUserResponse = $this->soapClient->AddWebUser($AddWebUser);
        return $AddWebUserResponse;
    }

    function GetWebUserDetails($GetWebUserDetails)
    {
        $GetWebUserDetailsResponse = $this->soapClient->GetWebUserDetails($GetWebUserDetails);
        return $GetWebUserDetailsResponse;
    }

    function UpdateWebUser($UpdateWebUser)
    {
        $UpdateWebUserResponse = $this->soapClient->UpdateWebUser($UpdateWebUser);
        return $UpdateWebUserResponse;
    }

    function GetWebUserWebProcessTemplates($GetWebUserWebProcessTemplates)
    {
        $GetWebUserWebProcessTemplatesResponse = $this->soapClient->GetWebUserWebProcessTemplates($GetWebUserWebProcessTemplates);
        return $GetWebUserWebProcessTemplatesResponse;
    }

    function UpdateBooking($UpdateBooking)
    {
        $UpdateBookingResponse = $this->soapClient->UpdateBooking($UpdateBooking);
        return $UpdateBookingResponse;
    }

    function UpdateBooking2($UpdateBooking2)
    {
        $UpdateBooking2Response = $this->soapClient->UpdateBooking2($UpdateBooking2);
        return $UpdateBooking2Response;
    }

    function GetRoomAvailability($GetRoomAvailability)
    {
        $GetRoomAvailabilityResponse = $this->soapClient->GetRoomAvailability($GetRoomAvailability);
        return $GetRoomAvailabilityResponse;
    }

    function GetRoomsAvailable($GetRoomsAvailable)
    {
        $GetRoomsAvailableResponse = $this->soapClient->GetRoomsAvailable($GetRoomsAvailable);
        return $GetRoomsAvailableResponse;
    }

    function GetRoomsAvailable2($GetRoomsAvailable2)
    {
        $GetRoomsAvailable2Response = $this->soapClient->GetRoomsAvailable2($GetRoomsAvailable2);
        return $GetRoomsAvailable2Response;
    }

    function GetBooking($GetBooking)
    {
        $GetBookingResponse = $this->soapClient->GetBooking($GetBooking);
        return $GetBookingResponse;
    }

    function GetGroups($GetGroups)
    {
        $GetGroupsResponse = $this->soapClient->GetGroups($GetGroups);
        return $GetGroupsResponse;
    }

    function GetWebUsers($GetWebUsers)
    {
        $GetWebUsersResponse = $this->soapClient->GetWebUsers($GetWebUsers);
        return $GetWebUsersResponse;
    }

    function GetWebTemplates($GetWebTemplates)
    {
        $GetWebTemplatesResponse = $this->soapClient->GetWebTemplates($GetWebTemplates);
        return $GetWebTemplatesResponse;
    }

    function AddPayment($AddPayment)
    {
        $AddPaymentResponse = $this->soapClient->AddPayment($AddPayment);
        return $AddPaymentResponse;
    }

    function UpdateCheckInStatus($UpdateCheckInStatus)
    {
        $UpdateCheckInStatusResponse = $this->soapClient->UpdateCheckInStatus($UpdateCheckInStatus);
        return $UpdateCheckInStatusResponse;
    }

    function GetCheckInStatus($GetCheckInStatus)
    {
        $GetCheckInStatusResponse = $this->soapClient->GetCheckInStatus($GetCheckInStatus);
        return $GetCheckInStatusResponse;
    }

    function GetCourseBookings($GetCourseBookings)
    {
        $GetCourseBookingsResponse = $this->soapClient->GetCourseBookings($GetCourseBookings);
        return $GetCourseBookingsResponse;
    }

    function GetServiceOrderDetails($GetServiceOrderDetails)
    {
        $GetServiceOrderDetailsResponse = $this->soapClient->GetServiceOrderDetails($GetServiceOrderDetails);
        return $GetServiceOrderDetailsResponse;
    }

    function GetServiceOrderDetails2($GetServiceOrderDetails2)
    {
        $GetServiceOrderDetails2Response = $this->soapClient->GetServiceOrderDetails2($GetServiceOrderDetails2);
        return $GetServiceOrderDetails2Response;
    }

    function GetWebSecurityTemplateRoles($GetWebSecurityTemplateRoles)
    {
        $GetWebSecurityTemplateRolesResponse = $this->soapClient->GetWebSecurityTemplateRoles($GetWebSecurityTemplateRoles);
        return $GetWebSecurityTemplateRolesResponse;
    }

    function GetWebProcessTemplateSettings($GetWebProcessTemplateSettings)
    {
        $GetWebProcessTemplateSettingsResponse = $this->soapClient->GetWebProcessTemplateSettings($GetWebProcessTemplateSettings);
        return $GetWebProcessTemplateSettingsResponse;
    }

    function GetBuildingHours($GetBuildingHours)
    {
        $GetBuildingHoursResponse = $this->soapClient->GetBuildingHours($GetBuildingHours);
        return $GetBuildingHoursResponse;
    }

    function GetBuildingHolidays($GetBuildingHolidays)
    {
        $GetBuildingHolidaysResponse = $this->soapClient->GetBuildingHolidays($GetBuildingHolidays);
        return $GetBuildingHolidaysResponse;
    }

    function GetWebProcessTemplateCategories($GetWebProcessTemplateCategories)
    {
        $GetWebProcessTemplateCategoriesResponse = $this->soapClient->GetWebProcessTemplateCategories($GetWebProcessTemplateCategories);
        return $GetWebProcessTemplateCategoriesResponse;
    }

    function GetWebUserOptions($GetWebUserOptions)
    {
        $GetWebUserOptionsResponse = $this->soapClient->GetWebUserOptions($GetWebUserOptions);
        return $GetWebUserOptionsResponse;
    }

    function UpdateWebUserOptions($UpdateWebUserOptions)
    {
        $UpdateWebUserOptionsResponse = $this->soapClient->UpdateWebUserOptions($UpdateWebUserOptions);
        return $UpdateWebUserOptionsResponse;
    }

    function GetReservationSources($GetReservationSources)
    {
        $GetReservationSourcesResponse = $this->soapClient->GetReservationSources($GetReservationSources);
        return $GetReservationSourcesResponse;
    }

    function GetContacts($GetContacts)
    {
        $GetContactsResponse = $this->soapClient->GetContacts($GetContacts);
        return $GetContactsResponse;
    }

    function GetGroupReservations($GetGroupReservations)
    {
        $GetGroupReservationsResponse = $this->soapClient->GetGroupReservations($GetGroupReservations);
        return $GetGroupReservationsResponse;
    }
}


