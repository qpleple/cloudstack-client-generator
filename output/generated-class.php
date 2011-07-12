/**
 * Creates and automatically starts a virtual machine based on a service offering, disk offering, and template.
 *
 * @param string $serviceOfferingId the ID of the service offering for the virtual machine
 * @param string $templateId the ID of the template for the virtual machine
 * @param string $zoneId availability zone for the virtual machine
 * @param string $account an optional account for the virtual machine. Must be used with domainId.
 * @param string $diskOfferingId the ID of the disk offering for the virtual machine. If the template is of ISO format, the diskOfferingId is for the root disk volume. Otherwise this parameter is used to indicate the offering for the data disk volume. If the templateId parameter passed is from a Template object, the diskOfferingId refers to a DATA Disk Volume created. If the templateId parameter passed is from an ISO object, the diskOfferingId refers to a ROOT Disk Volume created.
 * @param string $displayName an optional user generated name for the virtual machine
 * @param string $domainId an optional domainId for the virtual machine. If the account parameter is used, domainId must also be used.
 * @param string $group an optional group for the virtual machine
 * @param string $hypervisor the hypervisor on which to deploy the virtual machine
 * @param string $keyPair name of the ssh key pair used to login to the virtual machine
 * @param string $name host name for the virtual machine
 * @param string $networkIds list of network ids used by virtual machine
 * @param string $securityGroupIds comma separated list of security groups id that going to be applied to the virtual machine. Should be passed only when vm is created from a zone with Basic Network support
 * @param string $size the arbitrary size for the DATADISK volume. Mutually exclusive with diskOfferingId
 * @param string $userData an optional binary data that can be sent to the virtual machine upon a successful deployment. This binary data must be base64 encoded before adding it to the request. Currently only HTTP GET is supported. Using HTTP GET (via querystring), you can send up to 2KB of data after base64 encoding.
 */

public function deployVirtualMachine($serviceOfferingId, $templateId, $zoneId, $account = "", $diskOfferingId = "", $displayName = "", $domainId = "", $group = "", $hypervisor = "", $keyPair = "", $name = "", $networkIds = "", $securityGroupIds = "", $size = "", $userData = "")
{
    $this->request("deployVirtualMachine", array(
       'serviceofferingid' => $serviceOfferingId, 
       'templateid' => $templateId, 
       'zoneid' => $zoneId, 
       'account' => $account, 
       'diskofferingid' => $diskOfferingId, 
       'displayname' => $displayName, 
       'domainid' => $domainId, 
       'group' => $group, 
       'hypervisor' => $hypervisor, 
       'keypair' => $keyPair, 
       'name' => $name, 
       'networkids' => $networkIds, 
       'securitygroupids' => $securityGroupIds, 
       'size' => $size, 
       'userdata' => $userData
    ));

}
/**
 * Destroys a virtual machine. Once destroyed, only the administrator can recover it.
 *
 * @param string $id The ID of the virtual machine
 */

public function destroyVirtualMachine($id)
{
    $this->request("destroyVirtualMachine", array(
       'id' => $id
    ));

}
/**
 * Reboots a virtual machine.
 *
 * @param string $id The ID of the virtual machine
 */

public function rebootVirtualMachine($id)
{
    $this->request("rebootVirtualMachine", array(
       'id' => $id
    ));

}
/**
 * Starts a virtual machine.
 *
 * @param string $id The ID of the virtual machine
 */

public function startVirtualMachine($id)
{
    $this->request("startVirtualMachine", array(
       'id' => $id
    ));

}
/**
 * Stops a virtual machine.
 *
 * @param string $id The ID of the virtual machine
 * @param string $forced Force stop the VM.  The caller knows the VM is stopped.
 */

public function stopVirtualMachine($id, $forced = "")
{
    $this->request("stopVirtualMachine", array(
       'id' => $id, 
       'forced' => $forced
    ));

}
/**
 * Resets the password for virtual machine. The virtual machine must be in a "Stopped" state and the template must already support this feature for this command to take effect. [async]
 *
 * @param string $id The ID of the virtual machine
 */

public function resetPasswordForVirtualMachine($id)
{
    $this->request("resetPasswordForVirtualMachine", array(
       'id' => $id
    ));

}
/**
 * Changes the service offering for a virtual machine. The virtual machine must be in a "Stopped" state for this command to take effect.
 *
 * @param string $id The ID of the virtual machine
 * @param string $serviceOfferingId the service offering ID to apply to the virtual machine
 */

public function changeServiceForVirtualMachine($id, $serviceOfferingId)
{
    $this->request("changeServiceForVirtualMachine", array(
       'id' => $id, 
       'serviceofferingid' => $serviceOfferingId
    ));

}
/**
 * Updates parameters of a virtual machine.
 *
 * @param string $id The ID of the virtual machine
 * @param string $displayName user generated name
 * @param string $group group of the virtual machine
 * @param string $haEnable true if high-availability is enabled for the virtual machine, false otherwise
 * @param string $osTypeId the ID of the OS type that best represents this VM.
 */

public function updateVirtualMachine($id, $displayName = "", $group = "", $haEnable = "", $osTypeId = "")
{
    $this->request("updateVirtualMachine", array(
       'id' => $id, 
       'displayname' => $displayName, 
       'group' => $group, 
       'haenable' => $haEnable, 
       'ostypeid' => $osTypeId
    ));

}
/**
 * List the virtual machines owned by the account.
 *
 * @param string $account account. Must be used with the domainId parameter.
 * @param string $domainId the domain ID. If used with the account parameter, lists virtual machines for the specified account in this domain.
 * @param string $forVirtualNetwork list by network type; true if need to list vms using Virtual Network, false otherwise
 * @param string $groupId the group ID
 * @param string $hostId the host ID
 * @param string $hypervisor the target hypervisor for the template
 * @param string $id the ID of the virtual machine
 * @param string $isRecursive defaults to false, but if true, lists all vms from the parent specified by the domain id till leaves.
 * @param string $name name of the virtual machine
 * @param string $networkId list by network id
 * @param string $podId the pod ID
 * @param string $state state of the virtual machine
 * @param string $zoneId the availability zone ID
 * @param string $page Pagination
 */

public function listVirtualMachines($account = "", $domainId = "", $forVirtualNetwork = "", $groupId = "", $hostId = "", $hypervisor = "", $id = "", $isRecursive = "", $name = "", $networkId = "", $podId = "", $state = "", $zoneId = "", $page = "1")
{
    $this->request("listVirtualMachines", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'forvirtualnetwork' => $forVirtualNetwork, 
       'groupid' => $groupId, 
       'hostid' => $hostId, 
       'hypervisor' => $hypervisor, 
       'id' => $id, 
       'isrecursive' => $isRecursive, 
       'name' => $name, 
       'networkid' => $networkId, 
       'podid' => $podId, 
       'state' => $state, 
       'zoneid' => $zoneId, 
       'page' => $page
    ));

}
/**
 * 
 *
 * @param string $id The ID of the virtual machine
 */

public function getVMPassword($id)
{
    $this->request("getVMPassword", array(
       'id' => $id
    ));

}
/**
 * Creates a template of a virtual machine. The virtual machine must be in a STOPPED state. A template created from this command is automatically designated as a private template visible to the account that created it.
 *
 * @param string $displayText the display text of the template. This is usually used for display purposes.
 * @param string $name the name of the template
 * @param string $osTypeId the ID of the OS Type that best represents the OS of this template.
 * @param string $bits 32 or 64 bit
 * @param string $isFeatured true if this template is a featured template, false otherwise
 * @param string $isPublic true if this template is a public template, false otherwise
 * @param string $passwordEnabled true if the template supports the password reset feature; default is false
 * @param string $requireShvm true if the template requres HVM, false otherwise
 * @param string $snapshotId the ID of the snapshot the template is being created from
 * @param string $volumeId the ID of the disk volume the template is being created from
 */

public function createTemplate($displayText, $name, $osTypeId, $bits = "", $isFeatured = "", $isPublic = "", $passwordEnabled = "", $requireShvm = "", $snapshotId = "", $volumeId = "")
{
    $this->request("createTemplate", array(
       'displaytext' => $displayText, 
       'name' => $name, 
       'ostypeid' => $osTypeId, 
       'bits' => $bits, 
       'isfeatured' => $isFeatured, 
       'ispublic' => $isPublic, 
       'passwordenabled' => $passwordEnabled, 
       'requireshvm' => $requireShvm, 
       'snapshotid' => $snapshotId, 
       'volumeid' => $volumeId
    ));

}
/**
 * Registers an existing template into the Cloud.com cloud. 
 *
 * @param string $displayText the display text of the template. This is usually used for display purposes.
 * @param string $format the format for the template. Possible values include QCOW2, RAW, and VHD.
 * @param string $hypervisor the target hypervisor for the template
 * @param string $name the name of the template
 * @param string $osTypeId the ID of the OS Type that best represents the OS of this template.
 * @param string $url the URL of where the template is hosted. Possible URL include http:// and https://
 * @param string $zoneId the ID of the zone the template is to be hosted on
 * @param string $account an optional accountName. Must be used with domainId.
 * @param string $bits 32 or 64 bits support. 64 by default
 * @param string $domainId an optional domainId. If the account parameter is used, domainId must also be used.
 * @param string $isExtractable true if the template or its derivatives are extractable; default is false
 * @param string $isFeatured true if this template is a featured template, false otherwise
 * @param string $isPublic true if the template is available to all accounts; default is true
 * @param string $passwordEnabled true if the template supports the password reset feature; default is false
 * @param string $requireShvm true if this template requires HVM
 */

public function registerTemplate($displayText, $format, $hypervisor, $name, $osTypeId, $url, $zoneId, $account = "", $bits = "", $domainId = "", $isExtractable = "", $isFeatured = "", $isPublic = "", $passwordEnabled = "", $requireShvm = "")
{
    $this->request("registerTemplate", array(
       'displaytext' => $displayText, 
       'format' => $format, 
       'hypervisor' => $hypervisor, 
       'name' => $name, 
       'ostypeid' => $osTypeId, 
       'url' => $url, 
       'zoneid' => $zoneId, 
       'account' => $account, 
       'bits' => $bits, 
       'domainid' => $domainId, 
       'isextractable' => $isExtractable, 
       'isfeatured' => $isFeatured, 
       'ispublic' => $isPublic, 
       'passwordenabled' => $passwordEnabled, 
       'requireshvm' => $requireShvm
    ));

}
/**
 * Updates attributes of a template.
 *
 * @param string $id the ID of the image file
 * @param string $bootable true if image is bootable, false otherwise
 * @param string $displayText the display text of the image
 * @param string $format the format for the image
 * @param string $name the name of the image file
 * @param string $osTypeId the ID of the OS type that best represents the OS of this image.
 * @param string $passwordEnabled true if the image supports the password reset feature; default is false
 */

public function updateTemplate($id, $bootable = "", $displayText = "", $format = "", $name = "", $osTypeId = "", $passwordEnabled = "")
{
    $this->request("updateTemplate", array(
       'id' => $id, 
       'bootable' => $bootable, 
       'displaytext' => $displayText, 
       'format' => $format, 
       'name' => $name, 
       'ostypeid' => $osTypeId, 
       'passwordenabled' => $passwordEnabled
    ));

}
/**
 * Copies a template from one zone to another.
 *
 * @param string $id Template ID.
 * @param string $destzoneId ID of the zone the template is being copied to.
 * @param string $sourceZoneId ID of the zone the template is currently hosted on.
 */

public function copyTemplate($id, $destzoneId, $sourceZoneId)
{
    $this->request("copyTemplate", array(
       'id' => $id, 
       'destzoneid' => $destzoneId, 
       'sourcezoneid' => $sourceZoneId
    ));

}
/**
 * Deletes a template from the system. All virtual machines using the deleted template will not be affected.
 *
 * @param string $id the ID of the template
 * @param string $zoneId the ID of zone of the template
 */

public function deleteTemplate($id, $zoneId = "")
{
    $this->request("deleteTemplate", array(
       'id' => $id, 
       'zoneid' => $zoneId
    ));

}
/**
 * List all public, private, and privileged templates.
 *
 * @param string $templateFilter possible values are "featured", "self", "self-executable", "executable", and "community".* featured-templates that are featured and are public* self-templates that have been registered/created by the owner* selfexecutable-templates that have been registered/created by the owner that can be used to deploy a new VM* executable-all templates that can be used to deploy a new VM* community-templates that are public.
 * @param string $account list template by account. Must be used with the domainId parameter.
 * @param string $domainId list all templates in specified domain. If used with the account parameter, lists all templates for an account in the specified domain.
 * @param string $hypervisor the hypervisor for which to restrict the search
 * @param string $id the template ID
 * @param string $name the template name
 * @param string $zoneId list templates by zoneId
 * @param string $page Pagination
 */

public function listTemplates($templateFilter, $account = "", $domainId = "", $hypervisor = "", $id = "", $name = "", $zoneId = "", $page = "1")
{
    $this->request("listTemplates", array(
       'templatefilter' => $templateFilter, 
       'account' => $account, 
       'domainid' => $domainId, 
       'hypervisor' => $hypervisor, 
       'id' => $id, 
       'name' => $name, 
       'zoneid' => $zoneId, 
       'page' => $page
    ));

}
/**
 * Updates a template visibility permissions. A public template is visible to all accounts within the same domain. A private template is visible only to the owner of the template. A priviledged template is a private template with account permissions added. Only accounts specified under the template permissions are visible to them.
 *
 * @param string $id the template ID
 * @param string $accounts a comma delimited list of accounts
 * @param string $isFeatured true for featured templates/isos, false otherwise
 * @param string $isPublic true for public templates/isos, false for private templates/isos
 * @param string $op permission operator (add, remove, reset)
 */

public function updateTemplatePermissions($id, $accounts = "", $isFeatured = "", $isPublic = "", $op = "")
{
    $this->request("updateTemplatePermissions", array(
       'id' => $id, 
       'accounts' => $accounts, 
       'isfeatured' => $isFeatured, 
       'ispublic' => $isPublic, 
       'op' => $op
    ));

}
/**
 * List template visibility and all accounts that have permissions to view this template.
 *
 * @param string $id the template ID
 * @param string $account List template visibility and permissions for the specified account. Must be used with the domainId parameter.
 * @param string $domainId List template visibility and permissions by domain. If used with the account parameter, specifies in which domain the specified account exists.
 * @param string $page Pagination
 */

public function listTemplatePermissions($id, $account = "", $domainId = "", $page = "1")
{
    $this->request("listTemplatePermissions", array(
       'id' => $id, 
       'account' => $account, 
       'domainid' => $domainId, 
       'page' => $page
    ));

}
/**
 * Extracts a template
 *
 * @param string $id the ID of the template
 * @param string $mode the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
 * @param string $zoneId the ID of the zone where the ISO is originally located
 * @param string $url the url to which the ISO would be extracted
 */

public function extractTemplate($id, $mode, $zoneId, $url = "")
{
    $this->request("extractTemplate", array(
       'id' => $id, 
       'mode' => $mode, 
       'zoneid' => $zoneId, 
       'url' => $url
    ));

}
/**
 * Attaches an ISO to a virtual machine.
 *
 * @param string $id the ID of the ISO file
 * @param string $virtualMachineId the ID of the virtual machine
 */

public function attachIso($id, $virtualMachineId)
{
    $this->request("attachIso", array(
       'id' => $id, 
       'virtualmachineid' => $virtualMachineId
    ));

}
/**
 * Detaches any ISO file (if any) currently attached to a virtual machine.
 *
 * @param string $virtualMachineId The ID of the virtual machine
 */

public function detachIso($virtualMachineId)
{
    $this->request("detachIso", array(
       'virtualmachineid' => $virtualMachineId
    ));

}
/**
 * Lists all available ISO files.
 *
 * @param string $account the account of the ISO file. Must be used with the domainId parameter.
 * @param string $bootable true if the ISO is bootable, false otherwise
 * @param string $domainId lists all available ISO files by ID of a domain. If used with the account parameter, lists all available ISO files for the account in the ID of a domain.
 * @param string $hypervisor the hypervisor for which to restrict the search
 * @param string $id list all isos by id
 * @param string $isoFilter possible values are "featured", "self", "self-executable","executable", and "community". * featured-ISOs that are featured and are publicself-ISOs that have been registered/created by the owner. * selfexecutable-ISOs that have been registered/created by the owner that can be used to deploy a new VM. * executable-all ISOs that can be used to deploy a new VM * community-ISOs that are public.
 * @param string $isPublic true if the ISO is publicly available to all users, false otherwise.
 * @param string $isReady true if this ISO is ready to be deployed
 * @param string $name list all isos by name
 * @param string $zoneId the ID of the zone
 * @param string $page Pagination
 */

public function listIsos($account = "", $bootable = "", $domainId = "", $hypervisor = "", $id = "", $isoFilter = "", $isPublic = "", $isReady = "", $name = "", $zoneId = "", $page = "1")
{
    $this->request("listIsos", array(
       'account' => $account, 
       'bootable' => $bootable, 
       'domainid' => $domainId, 
       'hypervisor' => $hypervisor, 
       'id' => $id, 
       'isofilter' => $isoFilter, 
       'ispublic' => $isPublic, 
       'isready' => $isReady, 
       'name' => $name, 
       'zoneid' => $zoneId, 
       'page' => $page
    ));

}
/**
 * Registers an existing ISO into the Cloud.com Cloud.
 *
 * @param string $displayText the display text of the ISO. This is usually used for display purposes.
 * @param string $name the name of the ISO
 * @param string $url the URL to where the ISO is currently being hosted
 * @param string $zoneId the ID of the zone you wish to register the ISO to.
 * @param string $account an optional account name. Must be used with domainId.
 * @param string $bootable true if this ISO is bootable
 * @param string $domainId an optional domainId. If the account parameter is used, domainId must also be used.
 * @param string $isFeatured true if you want this ISO to be featured
 * @param string $isPublic true if you want to register the ISO to be publicly available to all users, false otherwise.
 * @param string $osTypeId the ID of the OS Type that best represents the OS of this ISO
 */

public function registerIso($displayText, $name, $url, $zoneId, $account = "", $bootable = "", $domainId = "", $isFeatured = "", $isPublic = "", $osTypeId = "")
{
    $this->request("registerIso", array(
       'displaytext' => $displayText, 
       'name' => $name, 
       'url' => $url, 
       'zoneid' => $zoneId, 
       'account' => $account, 
       'bootable' => $bootable, 
       'domainid' => $domainId, 
       'isfeatured' => $isFeatured, 
       'ispublic' => $isPublic, 
       'ostypeid' => $osTypeId
    ));

}
/**
 * Updates an ISO file.
 *
 * @param string $id the ID of the image file
 * @param string $bootable true if image is bootable, false otherwise
 * @param string $displayText the display text of the image
 * @param string $format the format for the image
 * @param string $name the name of the image file
 * @param string $osTypeId the ID of the OS type that best represents the OS of this image.
 * @param string $passwordEnabled true if the image supports the password reset feature; default is false
 */

public function updateIso($id, $bootable = "", $displayText = "", $format = "", $name = "", $osTypeId = "", $passwordEnabled = "")
{
    $this->request("updateIso", array(
       'id' => $id, 
       'bootable' => $bootable, 
       'displaytext' => $displayText, 
       'format' => $format, 
       'name' => $name, 
       'ostypeid' => $osTypeId, 
       'passwordenabled' => $passwordEnabled
    ));

}
/**
 * Deletes an ISO file.
 *
 * @param string $id the ID of the ISO file
 * @param string $zoneId the ID of the zone of the ISO file. If not specified, the ISO will be deleted from all the zones
 */

public function deleteIso($id, $zoneId = "")
{
    $this->request("deleteIso", array(
       'id' => $id, 
       'zoneid' => $zoneId
    ));

}
/**
 * Copies an ISO file.
 *
 * @param string $id the ID of the ISO file
 * @param string $destzoneId the ID of the destination zone to which the ISO file will be copied
 * @param string $sourceZoneId the ID of the source zone from which the ISO file will be copied
 */

public function copyIso($id, $destzoneId, $sourceZoneId)
{
    $this->request("copyIso", array(
       'id' => $id, 
       'destzoneid' => $destzoneId, 
       'sourcezoneid' => $sourceZoneId
    ));

}
/**
 * Updates iso permissions
 *
 * @param string $id the template ID
 * @param string $accounts a comma delimited list of accounts
 * @param string $isFeatured true for featured templates/isos, false otherwise
 * @param string $isPublic true for public templates/isos, false for private templates/isos
 * @param string $op permission operator (add, remove, reset)
 */

public function updateIsoPermissions($id, $accounts = "", $isFeatured = "", $isPublic = "", $op = "")
{
    $this->request("updateIsoPermissions", array(
       'id' => $id, 
       'accounts' => $accounts, 
       'isfeatured' => $isFeatured, 
       'ispublic' => $isPublic, 
       'op' => $op
    ));

}
/**
 * List template visibility and all accounts that have permissions to view this template.
 *
 * @param string $id the template ID
 * @param string $account List template visibility and permissions for the specified account. Must be used with the domainId parameter.
 * @param string $domainId List template visibility and permissions by domain. If used with the account parameter, specifies in which domain the specified account exists.
 * @param string $page Pagination
 */

public function listIsoPermissions($id, $account = "", $domainId = "", $page = "1")
{
    $this->request("listIsoPermissions", array(
       'id' => $id, 
       'account' => $account, 
       'domainid' => $domainId, 
       'page' => $page
    ));

}
/**
 * Extracts an ISO
 *
 * @param string $id the ID of the ISO file
 * @param string $mode the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
 * @param string $zoneId the ID of the zone where the ISO is originally located
 * @param string $url the url to which the ISO would be extracted
 */

public function extractIso($id, $mode, $zoneId, $url = "")
{
    $this->request("extractIso", array(
       'id' => $id, 
       'mode' => $mode, 
       'zoneid' => $zoneId, 
       'url' => $url
    ));

}
/**
 * Attaches a disk volume to a virtual machine.
 *
 * @param string $id the ID of the disk volume
 * @param string $virtualMachineId 	the ID of the virtual machine
 * @param string $deviceId the ID of the device to map the volume to within the guest OS. If no deviceId is passed in, the next available deviceId will be chosen. Possible values for a Linux OS are:* 1 - /dev/xvdb* 2 - /dev/xvdc* 4 - /dev/xvde* 5 - /dev/xvdf* 6 - /dev/xvdg* 7 - /dev/xvdh* 8 - /dev/xvdi* 9 - /dev/xvdj
 */

public function attachVolume($id, $virtualMachineId, $deviceId = "")
{
    $this->request("attachVolume", array(
       'id' => $id, 
       'virtualmachineid' => $virtualMachineId, 
       'deviceid' => $deviceId
    ));

}
/**
 * Detaches a disk volume from a virtual machine.
 *
 * @param string $deviceId the device ID on the virtual machine where volume is detached from
 * @param string $id the ID of the disk volume
 * @param string $virtualMachineId the ID of the virtual machine where the volume is detached from
 */

public function detachVolume($deviceId = "", $id = "", $virtualMachineId = "")
{
    $this->request("detachVolume", array(
       'deviceid' => $deviceId, 
       'id' => $id, 
       'virtualmachineid' => $virtualMachineId
    ));

}
/**
 * Creates a disk volume from a disk offering. This disk volume must still be attached to a virtual machine to make use of it.
 *
 * @param string $name the name of the disk volume
 * @param string $account the account associated with the disk volume. Must be used with the domainId parameter.
 * @param string $diskOfferingId the ID of the disk offering. Either diskOfferingId or snapshotId must be passed in.
 * @param string $domainId the domain ID associated with the disk offering. If used with the account parameter returns the disk volume associated with the account for the specified domain.
 * @param string $size Arbitrary volume size. Mutually exclusive with diskOfferingId
 * @param string $snapshotId the snapshot ID for the disk volume. Either diskOfferingId or snapshotId must be passed in.
 * @param string $zoneId the ID of the availability zone
 */

public function createVolume($name, $account = "", $diskOfferingId = "", $domainId = "", $size = "", $snapshotId = "", $zoneId = "")
{
    $this->request("createVolume", array(
       'name' => $name, 
       'account' => $account, 
       'diskofferingid' => $diskOfferingId, 
       'domainid' => $domainId, 
       'size' => $size, 
       'snapshotid' => $snapshotId, 
       'zoneid' => $zoneId
    ));

}
/**
 * Deletes a detached disk volume.
 *
 * @param string $id The ID of the disk volume
 */

public function deleteVolume($id)
{
    $this->request("deleteVolume", array(
       'id' => $id
    ));

}
/**
 * Lists all volumes.
 *
 * @param string $account the account associated with the disk volume. Must be used with the domainId parameter.
 * @param string $domainId Lists all disk volumes for the specified domain ID. If used with the account parameter, returns all disk volumes for an account in the specified domain ID.
 * @param string $hostId list volumes on specified host
 * @param string $id the ID of the disk volume
 * @param string $isRecursive defaults to false, but if true, lists all volumes from the parent specified by the domain id till leaves.
 * @param string $name the name of the disk volume
 * @param string $podId the pod id the disk volume belongs to
 * @param string $type the type of disk volume
 * @param string $virtualMachineId the ID of the virtual machine
 * @param string $zoneId the ID of the availability zone
 * @param string $page Pagination
 */

public function listVolumes($account = "", $domainId = "", $hostId = "", $id = "", $isRecursive = "", $name = "", $podId = "", $type = "", $virtualMachineId = "", $zoneId = "", $page = "1")
{
    $this->request("listVolumes", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'hostid' => $hostId, 
       'id' => $id, 
       'isrecursive' => $isRecursive, 
       'name' => $name, 
       'podid' => $podId, 
       'type' => $type, 
       'virtualmachineid' => $virtualMachineId, 
       'zoneid' => $zoneId, 
       'page' => $page
    ));

}
/**
 * Extracts volume
 *
 * @param string $id the ID of the volume
 * @param string $mode the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
 * @param string $zoneId the ID of the zone where the volume is located
 * @param string $url the url to which the volume would be extracted
 */

public function extractVolume($id, $mode, $zoneId, $url = "")
{
    $this->request("extractVolume", array(
       'id' => $id, 
       'mode' => $mode, 
       'zoneid' => $zoneId, 
       'url' => $url
    ));

}
/**
 * Creates a security group
 *
 * @param string $name name of the security group
 * @param string $account an optional account for the security group. Must be used with domainId.
 * @param string $description the description of the security group
 * @param string $domainId an optional domainId for the security group. If the account parameter is used, domainId must also be used.
 */

public function createSecurityGroup($name, $account = "", $description = "", $domainId = "")
{
    $this->request("createSecurityGroup", array(
       'name' => $name, 
       'account' => $account, 
       'description' => $description, 
       'domainid' => $domainId
    ));

}
/**
 * Deletes security group
 *
 * @param string $id The ID of the security group
 * @param string $account the account of the security group. Must be specified with domain ID
 * @param string $domainId the domain ID of account owning the security group
 */

public function deleteSecurityGroup($id, $account = "", $domainId = "")
{
    $this->request("deleteSecurityGroup", array(
       'id' => $id, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * Authorizes a particular ingress rule for this security group
 *
 * @param string $securityGroupId The ID of the security group
 * @param string $account an optional account for the security group. Must be used with domainId.
 * @param string $cidrList the cidr list associated
 * @param string $domainId an optional domainId for the security group. If the account parameter is used, domainId must also be used.
 * @param string $endPort end port for this ingress rule
 * @param string $icmpCode error code for this icmp message
 * @param string $icmpType type of the icmp message being sent
 * @param string $protocol TCP is default. UDP is the other supported protocol
 * @param string $startPort start port for this ingress rule
 * @param string $userSecurityGroupList user to security group mapping
 */

public function authorizeSecurityGroupIngress($securityGroupId, $account = "", $cidrList = "", $domainId = "", $endPort = "", $icmpCode = "", $icmpType = "", $protocol = "", $startPort = "", $userSecurityGroupList = "")
{
    $this->request("authorizeSecurityGroupIngress", array(
       'securitygroupid' => $securityGroupId, 
       'account' => $account, 
       'cidrlist' => $cidrList, 
       'domainid' => $domainId, 
       'endport' => $endPort, 
       'icmpcode' => $icmpCode, 
       'icmptype' => $icmpType, 
       'protocol' => $protocol, 
       'startport' => $startPort, 
       'usersecuritygrouplist' => $userSecurityGroupList
    ));

}
/**
 * Deletes a particular ingress rule from this security group
 *
 * @param string $id The ID of the ingress rule
 * @param string $account an optional account for the security group. Must be used with domainId.
 * @param string $domainId an optional domainId for the security group. If the account parameter is used, domainId must also be used.
 */

public function revokeSecurityGroupIngress($id, $account = "", $domainId = "")
{
    $this->request("revokeSecurityGroupIngress", array(
       'id' => $id, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * Lists security groups
 *
 * @param string $account lists all available port security groups for the account. Must be used with domainID parameter
 * @param string $domainId lists all available security groups for the domain ID. If used with the account parameter, lists all available security groups for the account in the specified domain ID.
 * @param string $id list the security group by the id provided
 * @param string $securityGroupName lists security groups by name
 * @param string $virtualMachineId lists security groups by virtual machine id
 * @param string $page Pagination
 */

public function listSecurityGroups($account = "", $domainId = "", $id = "", $securityGroupName = "", $virtualMachineId = "", $page = "1")
{
    $this->request("listSecurityGroups", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'securitygroupname' => $securityGroupName, 
       'virtualmachineid' => $virtualMachineId, 
       'page' => $page
    ));

}
/**
 * Lists accounts and provides detailed account information for listed accounts
 *
 * @param string $accountType list accounts by account type. Valid account types are 1 (admin), 2 (domain-admin), and 0 (user).
 * @param string $domainId list all accounts in specified domain. If used with the name parameter, retrieves account information for the account with specified name in specified domain.
 * @param string $id list account by account ID
 * @param string $isCleanuPrequired list accounts by cleanuprequred attribute (values are true or false)
 * @param string $isRecursive defaults to false, but if true, lists all accounts from the parent specified by the domain id till leaves.
 * @param string $name list account by account name
 * @param string $state list accounts by state. Valid states are enabled, disabled, and locked.
 * @param string $page Pagination
 */

public function listAccounts($accountType = "", $domainId = "", $id = "", $isCleanuPrequired = "", $isRecursive = "", $name = "", $state = "", $page = "1")
{
    $this->request("listAccounts", array(
       'accounttype' => $accountType, 
       'domainid' => $domainId, 
       'id' => $id, 
       'iscleanuprequired' => $isCleanuPrequired, 
       'isrecursive' => $isRecursive, 
       'name' => $name, 
       'state' => $state, 
       'page' => $page
    ));

}
/**
 * Creates an instant snapshot of a volume.
 *
 * @param string $volumeId The ID of the disk volume
 * @param string $account The account of the snapshot. The account parameter must be used with the domainId parameter.
 * @param string $domainId The domain ID of the snapshot. If used with the account parameter, specifies a domain for the account associated with the disk volume.
 * @param string $policyId policy id of the snapshot, if this is null, then use MANUAL_POLICY.
 */

public function createSnapshot($volumeId, $account = "", $domainId = "", $policyId = "")
{
    $this->request("createSnapshot", array(
       'volumeid' => $volumeId, 
       'account' => $account, 
       'domainid' => $domainId, 
       'policyid' => $policyId
    ));

}
/**
 * Lists all available snapshots for the account.
 *
 * @param string $account lists snapshot belongig to the specified account. Must be used with the domainId parameter.
 * @param string $domainId the domain ID. If used with the account parameter, lists snapshots for the specified account in this domain.
 * @param string $id lists snapshot by snapshot ID
 * @param string $intervalType valid values are HOURLY, DAILY, WEEKLY, and MONTHLY.
 * @param string $isRecursive defaults to false, but if true, lists all snapshots from the parent specified by the domain id till leaves.
 * @param string $name lists snapshot by snapshot name
 * @param string $snapshotType valid values are MANUAL or RECURRING.
 * @param string $volumeId the ID of the disk volume
 * @param string $page Pagination
 */

public function listSnapshots($account = "", $domainId = "", $id = "", $intervalType = "", $isRecursive = "", $name = "", $snapshotType = "", $volumeId = "", $page = "1")
{
    $this->request("listSnapshots", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'intervaltype' => $intervalType, 
       'isrecursive' => $isRecursive, 
       'name' => $name, 
       'snapshottype' => $snapshotType, 
       'volumeid' => $volumeId, 
       'page' => $page
    ));

}
/**
 * Deletes a snapshot of a disk volume.
 *
 * @param string $id The ID of the snapshot
 */

public function deleteSnapshot($id)
{
    $this->request("deleteSnapshot", array(
       'id' => $id
    ));

}
/**
 * Creates a snapshot policy for the account.
 *
 * @param string $intervalType valid values are HOURLY, DAILY, WEEKLY, and MONTHLY
 * @param string $maxSnaps maximum number of snapshots to retain
 * @param string $schedule time the snapshot is scheduled to be taken. Format is:* if HOURLY, MM* if DAILY, MM:HH* if WEEKLY, MM:HH:DD (1-7)* if MONTHLY, MM:HH:DD (1-28)
 * @param string $timezone Specifies a timezone for this command. For more information on the timezone parameter, see Time Zone Format.
 * @param string $volumeId the ID of the disk volume
 */

public function createSnapshotPolicy($intervalType, $maxSnaps, $schedule, $timezone, $volumeId)
{
    $this->request("createSnapshotPolicy", array(
       'intervaltype' => $intervalType, 
       'maxsnaps' => $maxSnaps, 
       'schedule' => $schedule, 
       'timezone' => $timezone, 
       'volumeid' => $volumeId
    ));

}
/**
 * Deletes snapshot policies for the account.
 *
 * @param string $id the Id of the snapshot
 * @param string $ids list of snapshots IDs separated by comma
 */

public function deleteSnapshotPolicies($id = "", $ids = "")
{
    $this->request("deleteSnapshotPolicies", array(
       'id' => $id, 
       'ids' => $ids
    ));

}
/**
 * Lists snapshot policies.
 *
 * @param string $volumeId the ID of the disk volume
 * @param string $account lists snapshot policies for the specified account. Must be used with domainid parameter.
 * @param string $domainId the domain ID. If used with the account parameter, lists snapshot policies for the specified account in this domain.
 * @param string $page Pagination
 */

public function listSnapshotPolicies($volumeId, $account = "", $domainId = "", $page = "1")
{
    $this->request("listSnapshotPolicies", array(
       'volumeid' => $volumeId, 
       'account' => $account, 
       'domainid' => $domainId, 
       'page' => $page
    ));

}
/**
 * Retrieves the current status of asynchronous job.
 *
 * @param string $jobId the ID of the asychronous job
 */

public function queryAsyncJobResult($jobId)
{
    $this->request("queryAsyncJobResult", array(
       'jobid' => $jobId
    ));

}
/**
 * Lists all pending asynchronous jobs for the account.
 *
 * @param string $account the account associated with the async job. Must be used with the domainId parameter.
 * @param string $domainId the domain ID associated with the async job.  If used with the account parameter, returns async jobs for the account in the specified domain.
 * @param string $startDate the start date of the async job
 * @param string $page Pagination
 */

public function listAsyncJobs($account = "", $domainId = "", $startDate = "", $page = "1")
{
    $this->request("listAsyncJobs", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'startdate' => $startDate, 
       'page' => $page
    ));

}
/**
 * A command to list events.
 *
 * @param string $account the account for the event. Must be used with the domainId parameter.
 * @param string $domainId the domain ID for the event. If used with the account parameter, returns all events for an account in the specified domain ID.
 * @param string $duration the duration of the event
 * @param string $endDate the end date range of the list you want to retrieve (use format "yyyy-MM-dd")
 * @param string $entryTime the time the event was entered
 * @param string $id the ID of the event
 * @param string $level the event level (INFO, WARN, ERROR)
 * @param string $startDate the start date range of the list you want to retrieve (use format "yyyy-MM-dd")
 * @param string $type the event type (see event types)
 * @param string $page Pagination
 */

public function listEvents($account = "", $domainId = "", $duration = "", $endDate = "", $entryTime = "", $id = "", $level = "", $startDate = "", $type = "", $page = "1")
{
    $this->request("listEvents", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'duration' => $duration, 
       'enddate' => $endDate, 
       'entrytime' => $entryTime, 
       'id' => $id, 
       'level' => $level, 
       'startdate' => $startDate, 
       'type' => $type, 
       'page' => $page
    ));

}
/**
 * Lists all supported OS types for this cloud.
 *
 * @param string $id list by Os type Id
 * @param string $osCategoryId list by Os Category id
 * @param string $page Pagination
 */

public function listOsTypes($id = "", $osCategoryId = "", $page = "1")
{
    $this->request("listOsTypes", array(
       'id' => $id, 
       'oscategoryid' => $osCategoryId, 
       'page' => $page
    ));

}
/**
 * Lists all supported OS categories for this cloud.
 *
 * @param string $id list Os category by id
 * @param string $page Pagination
 */

public function listOsCategories($id = "", $page = "1")
{
    $this->request("listOsCategories", array(
       'id' => $id, 
       'page' => $page
    ));

}
/**
 * Lists all available service offerings.
 *
 * @param string $domainId the ID of the domain associated with the service offering
 * @param string $id ID of the service offering
 * @param string $name name of the service offering
 * @param string $virtualMachineId the ID of the virtual machine. Pass this in if you want to see the available service offering that a virtual machine can be changed to.
 * @param string $page Pagination
 */

public function listServiceOfferings($domainId = "", $id = "", $name = "", $virtualMachineId = "", $page = "1")
{
    $this->request("listServiceOfferings", array(
       'domainid' => $domainId, 
       'id' => $id, 
       'name' => $name, 
       'virtualmachineid' => $virtualMachineId, 
       'page' => $page
    ));

}
/**
 * Lists all available disk offerings.
 *
 * @param string $domainId the ID of the domain of the disk offering.
 * @param string $id ID of the disk offering
 * @param string $name name of the disk offering
 * @param string $page Pagination
 */

public function listDiskOfferings($domainId = "", $id = "", $name = "", $page = "1")
{
    $this->request("listDiskOfferings", array(
       'domainid' => $domainId, 
       'id' => $id, 
       'name' => $name, 
       'page' => $page
    ));

}
/**
 * Creates a l2tp/ipsec remote access vpn
 *
 * @param string $publicIpId public ip address id of the vpn server
 * @param string $account an optional account for the VPN. Must be used with domainId.
 * @param string $domainId an optional domainId for the VPN. If the account parameter is used, domainId must also be used.
 * @param string $ipRange the range of ip addresses to allocate to vpn clients. The first ip in the range will be taken by the vpn server
 */

public function createRemoteAccessVpn($publicIpId, $account = "", $domainId = "", $ipRange = "")
{
    $this->request("createRemoteAccessVpn", array(
       'publicipid' => $publicIpId, 
       'account' => $account, 
       'domainid' => $domainId, 
       'iprange' => $ipRange
    ));

}
/**
 * Destroys a l2tp/ipsec remote access vpn
 *
 * @param string $publicIpId public ip address id of the vpn server
 */

public function deleteRemoteAccessVpn($publicIpId)
{
    $this->request("deleteRemoteAccessVpn", array(
       'publicipid' => $publicIpId
    ));

}
/**
 * Lists remote access vpns
 *
 * @param string $publicIpId public ip address id of the vpn server
 * @param string $account the account of the remote access vpn. Must be used with the domainId parameter.
 * @param string $domainId the domain ID of the remote access vpn rule. If used with the account parameter, lists remote access vpns for the account in the specified domain.
 * @param string $page Pagination
 */

public function listRemoteAccessVpns($publicIpId, $account = "", $domainId = "", $page = "1")
{
    $this->request("listRemoteAccessVpns", array(
       'publicipid' => $publicIpId, 
       'account' => $account, 
       'domainid' => $domainId, 
       'page' => $page
    ));

}
/**
 * Adds vpn users
 *
 * @param string $password password for the username
 * @param string $userName username for the vpn user
 * @param string $account an optional account for the vpn user. Must be used with domainId.
 * @param string $domainId an optional domainId for the vpn user. If the account parameter is used, domainId must also be used.
 */

public function addVpnUser($password, $userName, $account = "", $domainId = "")
{
    $this->request("addVpnUser", array(
       'password' => $password, 
       'username' => $userName, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * Removes vpn user
 *
 * @param string $userName username for the vpn user
 * @param string $account an optional account for the vpn user. Must be used with domainId.
 * @param string $domainId an optional domainId for the vpn user. If the account parameter is used, domainId must also be used.
 */

public function removeVpnUser($userName, $account = "", $domainId = "")
{
    $this->request("removeVpnUser", array(
       'username' => $userName, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * Lists vpn users
 *
 * @param string $account the account of the remote access vpn. Must be used with the domainId parameter.
 * @param string $domainId the domain ID of the remote access vpn. If used with the account parameter, lists remote access vpns for the account in the specified domain.
 * @param string $id the ID of the vpn user
 * @param string $userName the username of the vpn user.
 * @param string $page Pagination
 */

public function listVpnUsers($account = "", $domainId = "", $id = "", $userName = "", $page = "1")
{
    $this->request("listVpnUsers", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'username' => $userName, 
       'page' => $page
    ));

}
/**
 * Acquires and associates a public IP to an account.
 *
 * @param string $zoneId the ID of the availability zone you want to acquire an public IP address from
 * @param string $account the account to associate with this IP address
 * @param string $domainId the ID of the domain to associate with this IP address
 * @param string $networkId The network this ip address should be associated to.
 */

public function associateIpAddress($zoneId, $account = "", $domainId = "", $networkId = "")
{
    $this->request("associateIpAddress", array(
       'zoneid' => $zoneId, 
       'account' => $account, 
       'domainid' => $domainId, 
       'networkid' => $networkId
    ));

}
/**
 * Disassociates an ip address from the account.
 *
 * @param string $id the id of the public ip address to disassociate
 */

public function disassociateIpAddress($id)
{
    $this->request("disassociateIpAddress", array(
       'id' => $id
    ));

}
/**
 * Lists all public ip addresses
 *
 * @param string $account lists all public IP addresses by account. Must be used with the domainId parameter.
 * @param string $allocatedOnly limits search results to allocated public IP addresses
 * @param string $domainId lists all public IP addresses by domain ID. If used with the account parameter, lists all public IP addresses by account for specified domain.
 * @param string $forVirtualNetwork the virtual network for the IP address
 * @param string $id lists ip address by id
 * @param string $ipAddress lists the specified IP address
 * @param string $vlanId lists all public IP addresses by VLAN ID
 * @param string $zoneId lists all public IP addresses by Zone ID
 * @param string $page Pagination
 */

public function listPublicIpAddresses($account = "", $allocatedOnly = "", $domainId = "", $forVirtualNetwork = "", $id = "", $ipAddress = "", $vlanId = "", $zoneId = "", $page = "1")
{
    $this->request("listPublicIpAddresses", array(
       'account' => $account, 
       'allocatedonly' => $allocatedOnly, 
       'domainid' => $domainId, 
       'forvirtualnetwork' => $forVirtualNetwork, 
       'id' => $id, 
       'ipaddress' => $ipAddress, 
       'vlanid' => $vlanId, 
       'zoneid' => $zoneId, 
       'page' => $page
    ));

}
/**
 * Lists all port forwarding rules for an IP address.
 *
 * @param string $account account. Must be used with the domainId parameter.
 * @param string $domainId the domain ID. If used with the account parameter, lists port forwarding rules for the specified account in this domain.
 * @param string $id Lists rule with the specified ID.
 * @param string $ipAddressId the id of IP address of the port forwarding services
 * @param string $page Pagination
 */

public function listPortForwardingRules($account = "", $domainId = "", $id = "", $ipAddressId = "", $page = "1")
{
    $this->request("listPortForwardingRules", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'ipaddressid' => $ipAddressId, 
       'page' => $page
    ));

}
/**
 * Creates a port forwarding rule
 *
 * @param string $ipAddressId the IP address id of the port forwarding rule
 * @param string $privatePort the private port of the port forwarding rule
 * @param string $protocol the protocol for the port fowarding rule. Valid values are TCP or UDP.
 * @param string $publicPort 	the public port of the port forwarding rule
 * @param string $virtualMachineId the ID of the virtual machine for the port forwarding rule
 */

public function createPortForwardingRule($ipAddressId, $privatePort, $protocol, $publicPort, $virtualMachineId)
{
    $this->request("createPortForwardingRule", array(
       'ipaddressid' => $ipAddressId, 
       'privateport' => $privatePort, 
       'protocol' => $protocol, 
       'publicport' => $publicPort, 
       'virtualmachineid' => $virtualMachineId
    ));

}
/**
 * Deletes a port forwarding rule
 *
 * @param string $id the ID of the port forwarding rule
 */

public function deletePortForwardingRule($id)
{
    $this->request("deletePortForwardingRule", array(
       'id' => $id
    ));

}
/**
 * 
 *
 * @param string $ipAddressId the public IP address id for which static nat feature is being enabled
 * @param string $virtualMachineId the ID of the virtual machine for enabling static nat feature
 */

public function enableStaticNat($ipAddressId, $virtualMachineId)
{
    $this->request("enableStaticNat", array(
       'ipaddressid' => $ipAddressId, 
       'virtualmachineid' => $virtualMachineId
    ));

}
/**
 * Creates an ip forwarding rule
 *
 * @param string $ipAddressId the public IP address id of the forwarding rule, already associated via associateIp
 * @param string $protocol the protocol for the rule. Valid values are TCP or UDP.
 * @param string $startPort the start port for the rule
 * @param string $endPort the end port for the rule
 */

public function createIpForwardingRule($ipAddressId, $protocol, $startPort, $endPort = "")
{
    $this->request("createIpForwardingRule", array(
       'ipaddressid' => $ipAddressId, 
       'protocol' => $protocol, 
       'startport' => $startPort, 
       'endport' => $endPort
    ));

}
/**
 * Deletes an ip forwarding rule
 *
 * @param string $id the id of the forwarding rule
 */

public function deleteIpForwardingRule($id)
{
    $this->request("deleteIpForwardingRule", array(
       'id' => $id
    ));

}
/**
 * List the ip forwarding rules
 *
 * @param string $account the account associated with the ip forwarding rule. Must be used with the domainId parameter.
 * @param string $domainId Lists all rules for this id. If used with the account parameter, returns all rules for an account in the specified domain ID.
 * @param string $id Lists rule with the specified ID.
 * @param string $ipAddressId list the rule belonging to this public ip address
 * @param string $virtualMachineId Lists all rules applied to the specified Vm.
 * @param string $page Pagination
 */

public function listIpForwardingRules($account = "", $domainId = "", $id = "", $ipAddressId = "", $virtualMachineId = "", $page = "1")
{
    $this->request("listIpForwardingRules", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'ipaddressid' => $ipAddressId, 
       'virtualmachineid' => $virtualMachineId, 
       'page' => $page
    ));

}
/**
 * 
 *
 * @param string $ipAddressId the public IP address id for which static nat feature is being disableed
 */

public function disableStaticNat($ipAddressId)
{
    $this->request("disableStaticNat", array(
       'ipaddressid' => $ipAddressId
    ));

}
/**
 * Creates a load balancer rule
 *
 * @param string $algorithm load balancer algorithm (source, roundrobin, leastconn)
 * @param string $name name of the load balancer rule
 * @param string $privatePort the private port of the private ip address/virtual machine where the network traffic will be load balanced to
 * @param string $publicIpId public ip address id from where the network traffic will be load balanced from
 * @param string $publicPort the public port from where the network traffic will be load balanced from
 * @param string $description the description of the load balancer rule
 */

public function createLoadBalancerRule($algorithm, $name, $privatePort, $publicIpId, $publicPort, $description = "")
{
    $this->request("createLoadBalancerRule", array(
       'algorithm' => $algorithm, 
       'name' => $name, 
       'privateport' => $privatePort, 
       'publicipid' => $publicIpId, 
       'publicport' => $publicPort, 
       'description' => $description
    ));

}
/**
 * Deletes a load balancer rule.
 *
 * @param string $id the ID of the load balancer rule
 */

public function deleteLoadBalancerRule($id)
{
    $this->request("deleteLoadBalancerRule", array(
       'id' => $id
    ));

}
/**
 * Removes a virtual machine or a list of virtual machines from a load balancer rule.
 *
 * @param string $id The ID of the load balancer rule
 * @param string $virtualMachineIds the list of IDs of the virtual machines that are being removed from the load balancer rule (i.e. virtualMachineIds=1,2,3)
 */

public function removeFromLoadBalancerRule($id, $virtualMachineIds)
{
    $this->request("removeFromLoadBalancerRule", array(
       'id' => $id, 
       'virtualmachineids' => $virtualMachineIds
    ));

}
/**
 * Assigns virtual machine or a list of virtual machines to a load balancer rule.
 *
 * @param string $id the ID of the load balancer rule
 * @param string $virtualMachineIds the list of IDs of the virtual machine that are being assigned to the load balancer rule(i.e. virtualMachineIds=1,2,3)
 */

public function assignToLoadBalancerRule($id, $virtualMachineIds)
{
    $this->request("assignToLoadBalancerRule", array(
       'id' => $id, 
       'virtualmachineids' => $virtualMachineIds
    ));

}
/**
 * Lists load balancer rules.
 *
 * @param string $account the account of the load balancer rule. Must be used with the domainId parameter.
 * @param string $domainId the domain ID of the load balancer rule. If used with the account parameter, lists load balancer rules for the account in the specified domain.
 * @param string $id the ID of the load balancer rule
 * @param string $name the name of the load balancer rule
 * @param string $publicIpId the public IP address id of the load balancer rule	
 * @param string $virtualMachineId the ID of the virtual machine of the load balancer rule
 * @param string $page Pagination
 */

public function listLoadBalancerRules($account = "", $domainId = "", $id = "", $name = "", $publicIpId = "", $virtualMachineId = "", $page = "1")
{
    $this->request("listLoadBalancerRules", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'name' => $name, 
       'publicipid' => $publicIpId, 
       'virtualmachineid' => $virtualMachineId, 
       'page' => $page
    ));

}
/**
 * List all virtual machine instances that are assigned to a load balancer rule.
 *
 * @param string $id the ID of the load balancer rule
 * @param string $applied true if listing all virtual machines currently applied to the load balancer rule; default is true
 * @param string $page Pagination
 */

public function listLoadBalancerRuleInstances($id, $applied = "", $page = "1")
{
    $this->request("listLoadBalancerRuleInstances", array(
       'id' => $id, 
       'applied' => $applied, 
       'page' => $page
    ));

}
/**
 * Updates load balancer
 *
 * @param string $id the id of the load balancer rule to update
 * @param string $algorithm load balancer algorithm (source, roundrobin, leastconn)
 * @param string $description the description of the load balancer rule
 * @param string $name the name of the load balancer rule
 */

public function updateLoadBalancerRule($id, $algorithm = "", $description = "", $name = "")
{
    $this->request("updateLoadBalancerRule", array(
       'id' => $id, 
       'algorithm' => $algorithm, 
       'description' => $description, 
       'name' => $name
    ));

}
/**
 * 
 *
 * @param string $name Name of the keypair
 * @param string $ Public key material of the keypair
 */

public function registerSSHKeyPair($name, $)
{
    $this->request("registerSSHKeyPair", array(
       'name' => $name, 
       'publickey' => $
    ));

}
/**
 * 
 *
 * @param string $name Name of the keypair
 * @param string $account an optional account for the ssh key. Must be used with domainId.
 * @param string $domainId an optional domainId for the ssh key. If the account parameter is used, domainId must also be used.
 */

public function createSSHKeyPair($name, $account = "", $domainId = "")
{
    $this->request("createSSHKeyPair", array(
       'name' => $name, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * 
 *
 * @param string $name Name of the keypair
 * @param string $account the account associated with the keypair. Must be used with the domainId parameter.
 * @param string $domainId the domain ID associated with the keypair
 */

public function deleteSSHKeyPair($name, $account = "", $domainId = "")
{
    $this->request("deleteSSHKeyPair", array(
       'name' => $name, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * 
 *
 * @param string $ A public key fingerprint to look for
 * @param string $ List by keyword
 * @param string $name A key pair name to look for
 * @param string $page Pagination
 * @param string $ 
 */

public function listSSHKeyPairs($ = "", $ = "", $name = "", $page = "1", $ = "")
{
    $this->request("listSSHKeyPairs", array(
       'fingerprint' => $, 
       'keyword' => $, 
       'name' => $name, 
       'page' => $page, 
       'pagesize' => $
    ));

}
/**
 * Creates a vm group
 *
 * @param string $name the name of the instance group
 * @param string $account the account of the instance group. The account parameter must be used with the domainId parameter.
 * @param string $domainId the domain ID of account owning the instance group
 */

public function createInstanceGroup($name, $account = "", $domainId = "")
{
    $this->request("createInstanceGroup", array(
       'name' => $name, 
       'account' => $account, 
       'domainid' => $domainId
    ));

}
/**
 * Deletes a vm group
 *
 * @param string $id the ID of the instance group
 */

public function deleteInstanceGroup($id)
{
    $this->request("deleteInstanceGroup", array(
       'id' => $id
    ));

}
/**
 * Updates a vm group
 *
 * @param string $id Instance group ID
 * @param string $name new instance group name
 */

public function updateInstanceGroup($id, $name = "")
{
    $this->request("updateInstanceGroup", array(
       'id' => $id, 
       'name' => $name
    ));

}
/**
 * Lists vm groups
 *
 * @param string $account list instance group belonging to the specified account. Must be used with domainid parameter
 * @param string $domainId the domain ID. If used with the account parameter, lists virtual machines for the specified account in this domain.
 * @param string $id list instance groups by ID
 * @param string $name list instance groups by name
 * @param string $page Pagination
 */

public function listInstanceGroups($account = "", $domainId = "", $id = "", $name = "", $page = "1")
{
    $this->request("listInstanceGroups", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'name' => $name, 
       'page' => $page
    ));

}
/**
 * Creates a network
 *
 * @param string $displayText the display text of the network
 * @param string $name the name of the network
 * @param string $networkOfferingId the network offering id
 * @param string $zoneId the Zone ID for the Vlan ip range
 * @param string $account account who will own the network
 * @param string $domainId domain ID of the account owning a network
 * @param string $endIp the ending IP address in the VLAN IP range
 * @param string $gateway the gateway of the VLAN IP range
 * @param string $isDefault true if network is default, false otherwise
 * @param string $isShared true is network offering supports vlans
 * @param string $netmask the netmask of the VLAN IP range
 * @param string $networkDomain network domain
 * @param string $startIp the beginning IP address in the VLAN IP range
 * @param string $vlan the ID or VID of the VLAN. Default is an "untagged" VLAN.
 */

public function createNetwork($displayText, $name, $networkOfferingId, $zoneId, $account = "", $domainId = "", $endIp = "", $gateway = "", $isDefault = "", $isShared = "", $netmask = "", $networkDomain = "", $startIp = "", $vlan = "")
{
    $this->request("createNetwork", array(
       'displaytext' => $displayText, 
       'name' => $name, 
       'networkofferingid' => $networkOfferingId, 
       'zoneid' => $zoneId, 
       'account' => $account, 
       'domainid' => $domainId, 
       'endip' => $endIp, 
       'gateway' => $gateway, 
       'isdefault' => $isDefault, 
       'isshared' => $isShared, 
       'netmask' => $netmask, 
       'networkdomain' => $networkDomain, 
       'startip' => $startIp, 
       'vlan' => $vlan
    ));

}
/**
 * Deletes a network
 *
 * @param string $id the ID of the network
 */

public function deleteNetwork($id)
{
    $this->request("deleteNetwork", array(
       'id' => $id
    ));

}
/**
 * Lists all available networks.
 *
 * @param string $account account who will own the VLAN. If VLAN is Zone wide, this parameter should be ommited
 * @param string $domainId domain ID of the account owning a VLAN
 * @param string $id list networks by id
 * @param string $isDefault true if network is default, false otherwise
 * @param string $isShared true if network is shared, false otherwise
 * @param string $isSystem true if network is system, false otherwise
 * @param string $trafficType type of the traffic
 * @param string $type the type of the network
 * @param string $zoneId the Zone ID of the network
 * @param string $page Pagination
 */

public function listNetworks($account = "", $domainId = "", $id = "", $isDefault = "", $isShared = "", $isSystem = "", $trafficType = "", $type = "", $zoneId = "", $page = "1")
{
    $this->request("listNetworks", array(
       'account' => $account, 
       'domainid' => $domainId, 
       'id' => $id, 
       'isdefault' => $isDefault, 
       'isshared' => $isShared, 
       'issystem' => $isSystem, 
       'traffictype' => $trafficType, 
       'type' => $type, 
       'zoneid' => $zoneId, 
       'page' => $page
    ));

}
/**
 * 
 *
 * @param string $id The network this ip address should be associated to.
 */

public function restartNetwork($id)
{
    $this->request("restartNetwork", array(
       'id' => $id
    ));

}
/**
 * 
 *
 * @param string $id The network this ip address should be associated to.
 */

public function restartNetwork($id)
{
    $this->request("restartNetwork", array(
       'id' => $id
    ));

}

Warning: file_get_contents(http://download.cloud.com/releases/2.2.0/api/user/updateNetwork.html): failed to open stream: HTTP request failed! HTTP/1.1 403 Forbidden
 in /Users/qt/Sites/generateclass/simple_html_dom.php on line 39

Fatal error: Call to a member function find() on a non-object in /Users/qt/Sites/generateclass/generate.php on line 41
