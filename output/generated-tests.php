// Creates and automatically starts a virtual machine based on a service offering, disk offering, and template.
/*
$res = $client->deployVirtualMachine(
    "",  // $serviceOfferingId : the ID of the service offering for the virtual machine
    "",  // $templateId : the ID of the template for the virtual machine
    ""   // $zoneId : availability zone for the virtual machine
);
var_dump($res);
*/

// Destroys a virtual machine. Once destroyed, only the administrator can recover it.
/*
$res = $client->destroyVirtualMachine(
    ""   // $id : The ID of the virtual machine
);
var_dump($res);
*/

// Reboots a virtual machine.
/*
$res = $client->rebootVirtualMachine(
    ""   // $id : The ID of the virtual machine
);
var_dump($res);
*/

// Starts a virtual machine.
/*
$res = $client->startVirtualMachine(
    ""   // $id : The ID of the virtual machine
);
var_dump($res);
*/

// Stops a virtual machine.
/*
$res = $client->stopVirtualMachine(
    ""   // $id : The ID of the virtual machine
);
var_dump($res);
*/

// Resets the password for virtual machine. The virtual machine must be in a "Stopped" state and the template must already support this feature for this command to take effect. [async]
/*
$res = $client->resetPasswordForVirtualMachine(
    ""   // $id : The ID of the virtual machine
);
var_dump($res);
*/

// Changes the service offering for a virtual machine. The virtual machine must be in a "Stopped" state for this command to take effect.
/*
$res = $client->changeServiceForVirtualMachine(
    "",  // $id : The ID of the virtual machine
    ""   // $serviceOfferingId : the service offering ID to apply to the virtual machine
);
var_dump($res);
*/

// Updates parameters of a virtual machine.
/*
$res = $client->updateVirtualMachine(
    ""   // $id : The ID of the virtual machine
);
var_dump($res);
*/

// List the virtual machines owned by the account.
/*
$res = $client->listVirtualMachines(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Creates a template of a virtual machine. The virtual machine must be in a STOPPED state. A template created from this command is automatically designated as a private template visible to the account that created it.
/*
$res = $client->createTemplate(
    "",  // $displayText : the display text of the template. This is usually used for display purposes.
    "",  // $name : the name of the template
    ""   // $osTypeId : the ID of the OS Type that best represents the OS of this template.
);
var_dump($res);
*/

// Registers an existing template into the Cloud.com cloud. 
/*
$res = $client->registerTemplate(
    "",  // $displayText : the display text of the template. This is usually used for display purposes.
    "",  // $format : the format for the template. Possible values include QCOW2, RAW, and VHD.
    "",  // $hypervisor : the target hypervisor for the template
    "",  // $name : the name of the template
    "",  // $osTypeId : the ID of the OS Type that best represents the OS of this template.
    "",  // $url : the URL of where the template is hosted. Possible URL include http:// and https://
    ""   // $zoneId : the ID of the zone the template is to be hosted on
);
var_dump($res);
*/

// Updates attributes of a template.
/*
$res = $client->updateTemplate(
    ""   // $id : the ID of the image file
);
var_dump($res);
*/

// Copies a template from one zone to another.
/*
$res = $client->copyTemplate(
    "",  // $id : Template ID.
    "",  // $destzoneId : ID of the zone the template is being copied to.
    ""   // $sourceZoneId : ID of the zone the template is currently hosted on.
);
var_dump($res);
*/

// Deletes a template from the system. All virtual machines using the deleted template will not be affected.
/*
$res = $client->deleteTemplate(
    ""   // $id : the ID of the template
);
var_dump($res);
*/

// List all public, private, and privileged templates.
/*
$res = $client->listTemplates(
    "",  // $templateFilter : possible values are "featured", "self", "self-executable", "executable", and "community".* featured-templates that are featured and are public* self-templates that have been registered/created by the owner* selfexecutable-templates that have been registered/created by the owner that can be used to deploy a new VM* executable-all templates that can be used to deploy a new VM* community-templates that are public.
    ""   // $page : Pagination
);
var_dump($res);
*/

// Updates a template visibility permissions. A public template is visible to all accounts within the same domain. A private template is visible only to the owner of the template. A priviledged template is a private template with account permissions added. Only accounts specified under the template permissions are visible to them.
/*
$res = $client->updateTemplatePermissions(
    ""   // $id : the template ID
);
var_dump($res);
*/

// List template visibility and all accounts that have permissions to view this template.
/*
$res = $client->listTemplatePermissions(
    "",  // $id : the template ID
    ""   // $page : Pagination
);
var_dump($res);
*/

// Extracts a template
/*
$res = $client->extractTemplate(
    "",  // $id : the ID of the template
    "",  // $mode : the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
    ""   // $zoneId : the ID of the zone where the ISO is originally located
);
var_dump($res);
*/

// Attaches an ISO to a virtual machine.
/*
$res = $client->attachIso(
    "",  // $id : the ID of the ISO file
    ""   // $virtualMachineId : the ID of the virtual machine
);
var_dump($res);
*/

// Detaches any ISO file (if any) currently attached to a virtual machine.
/*
$res = $client->detachIso(
    ""   // $virtualMachineId : The ID of the virtual machine
);
var_dump($res);
*/

// Lists all available ISO files.
/*
$res = $client->listIsos(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Registers an existing ISO into the Cloud.com Cloud.
/*
$res = $client->registerIso(
    "",  // $displayText : the display text of the ISO. This is usually used for display purposes.
    "",  // $name : the name of the ISO
    "",  // $url : the URL to where the ISO is currently being hosted
    ""   // $zoneId : the ID of the zone you wish to register the ISO to.
);
var_dump($res);
*/

// Updates an ISO file.
/*
$res = $client->updateIso(
    ""   // $id : the ID of the image file
);
var_dump($res);
*/

// Deletes an ISO file.
/*
$res = $client->deleteIso(
    ""   // $id : the ID of the ISO file
);
var_dump($res);
*/

// Copies an ISO file.
/*
$res = $client->copyIso(
    "",  // $id : the ID of the ISO file
    "",  // $destzoneId : the ID of the destination zone to which the ISO file will be copied
    ""   // $sourceZoneId : the ID of the source zone from which the ISO file will be copied
);
var_dump($res);
*/

// Updates iso permissions
/*
$res = $client->updateIsoPermissions(
    ""   // $id : the template ID
);
var_dump($res);
*/

// List template visibility and all accounts that have permissions to view this template.
/*
$res = $client->listIsoPermissions(
    "",  // $id : the template ID
    ""   // $page : Pagination
);
var_dump($res);
*/

// Extracts an ISO
/*
$res = $client->extractIso(
    "",  // $id : the ID of the ISO file
    "",  // $mode : the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
    ""   // $zoneId : the ID of the zone where the ISO is originally located
);
var_dump($res);
*/

// Attaches a disk volume to a virtual machine.
/*
$res = $client->attachVolume(
    "",  // $id : the ID of the disk volume
    ""   // $virtualMachineId : 	the ID of the virtual machine
);
var_dump($res);
*/

// Detaches a disk volume from a virtual machine.
// $client->detachVolume();

// Creates a disk volume from a disk offering. This disk volume must still be attached to a virtual machine to make use of it.
/*
$res = $client->createVolume(
    ""   // $name : the name of the disk volume
);
var_dump($res);
*/

// Deletes a detached disk volume.
/*
$res = $client->deleteVolume(
    ""   // $id : The ID of the disk volume
);
var_dump($res);
*/

// Lists all volumes.
/*
$res = $client->listVolumes(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Extracts volume
/*
$res = $client->extractVolume(
    "",  // $id : the ID of the volume
    "",  // $mode : the mode of extraction - HTTP_DOWNLOAD or FTP_UPLOAD
    ""   // $zoneId : the ID of the zone where the volume is located
);
var_dump($res);
*/

// Creates a security group
/*
$res = $client->createSecurityGroup(
    ""   // $name : name of the security group
);
var_dump($res);
*/

// Deletes security group
/*
$res = $client->deleteSecurityGroup(
    ""   // $id : The ID of the security group
);
var_dump($res);
*/

// Authorizes a particular ingress rule for this security group
/*
$res = $client->authorizeSecurityGroupIngress(
    ""   // $securityGroupId : The ID of the security group
);
var_dump($res);
*/

// Deletes a particular ingress rule from this security group
/*
$res = $client->revokeSecurityGroupIngress(
    ""   // $id : The ID of the ingress rule
);
var_dump($res);
*/

// Lists security groups
/*
$res = $client->listSecurityGroups(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists accounts and provides detailed account information for listed accounts
/*
$res = $client->listAccounts(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Creates an instant snapshot of a volume.
/*
$res = $client->createSnapshot(
    ""   // $volumeId : The ID of the disk volume
);
var_dump($res);
*/

// Lists all available snapshots for the account.
/*
$res = $client->listSnapshots(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Deletes a snapshot of a disk volume.
/*
$res = $client->deleteSnapshot(
    ""   // $id : The ID of the snapshot
);
var_dump($res);
*/

// Creates a snapshot policy for the account.
/*
$res = $client->createSnapshotPolicy(
    "",  // $intervalType : valid values are HOURLY, DAILY, WEEKLY, and MONTHLY
    "",  // $maxSnaps : maximum number of snapshots to retain
    "",  // $schedule : time the snapshot is scheduled to be taken. Format is:* if HOURLY, MM* if DAILY, MM:HH* if WEEKLY, MM:HH:DD (1-7)* if MONTHLY, MM:HH:DD (1-28)
    "",  // $timezone : Specifies a timezone for this command. For more information on the timezone parameter, see Time Zone Format.
    ""   // $volumeId : the ID of the disk volume
);
var_dump($res);
*/

// Deletes snapshot policies for the account.
// $client->deleteSnapshotPolicies();

// Lists snapshot policies.
/*
$res = $client->listSnapshotPolicies(
    "",  // $volumeId : the ID of the disk volume
    ""   // $page : Pagination
);
var_dump($res);
*/

// Retrieves the current status of asynchronous job.
/*
$res = $client->queryAsyncJobResult(
    ""   // $jobId : the ID of the asychronous job
);
var_dump($res);
*/

// Lists all pending asynchronous jobs for the account.
/*
$res = $client->listAsyncJobs(
    ""   // $page : Pagination
);
var_dump($res);
*/

// A command to list events.
/*
$res = $client->listEvents(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists all supported OS types for this cloud.
/*
$res = $client->listOsTypes(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists all supported OS categories for this cloud.
/*
$res = $client->listOsCategories(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists all available service offerings.
/*
$res = $client->listServiceOfferings(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists all available disk offerings.
/*
$res = $client->listDiskOfferings(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Creates a l2tp/ipsec remote access vpn
/*
$res = $client->createRemoteAccessVpn(
    ""   // $publicIpId : public ip address id of the vpn server
);
var_dump($res);
*/

// Destroys a l2tp/ipsec remote access vpn
/*
$res = $client->deleteRemoteAccessVpn(
    ""   // $publicIpId : public ip address id of the vpn server
);
var_dump($res);
*/

// Lists remote access vpns
/*
$res = $client->listRemoteAccessVpns(
    "",  // $publicIpId : public ip address id of the vpn server
    ""   // $page : Pagination
);
var_dump($res);
*/

// Adds vpn users
/*
$res = $client->addVpnUser(
    "",  // $password : password for the username
    ""   // $userName : username for the vpn user
);
var_dump($res);
*/

// Removes vpn user
/*
$res = $client->removeVpnUser(
    ""   // $userName : username for the vpn user
);
var_dump($res);
*/

// Lists vpn users
/*
$res = $client->listVpnUsers(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Acquires and associates a public IP to an account.
/*
$res = $client->associateIpAddress(
    ""   // $zoneId : the ID of the availability zone you want to acquire an public IP address from
);
var_dump($res);
*/

// Disassociates an ip address from the account.
/*
$res = $client->disassociateIpAddress(
    ""   // $id : the id of the public ip address to disassociate
);
var_dump($res);
*/

// Lists all public ip addresses
/*
$res = $client->listPublicIpAddresses(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists all port forwarding rules for an IP address.
/*
$res = $client->listPortForwardingRules(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Creates a port forwarding rule
/*
$res = $client->createPortForwardingRule(
    "",  // $ipAddressId : the IP address id of the port forwarding rule
    "",  // $privatePort : the private port of the port forwarding rule
    "",  // $protocol : the protocol for the port fowarding rule. Valid values are TCP or UDP.
    "",  // $publicPort : 	the public port of the port forwarding rule
    ""   // $virtualMachineId : the ID of the virtual machine for the port forwarding rule
);
var_dump($res);
*/

// Deletes a port forwarding rule
/*
$res = $client->deletePortForwardingRule(
    ""   // $id : the ID of the port forwarding rule
);
var_dump($res);
*/

// Creates an ip forwarding rule
/*
$res = $client->createIpForwardingRule(
    "",  // $ipAddressId : the public IP address id of the forwarding rule, already associated via associateIp
    "",  // $protocol : the protocol for the rule. Valid values are TCP or UDP.
    ""   // $startPort : the start port for the rule
);
var_dump($res);
*/

// Deletes an ip forwarding rule
/*
$res = $client->deleteIpForwardingRule(
    ""   // $id : the id of the forwarding rule
);
var_dump($res);
*/

// List the ip forwarding rules
/*
$res = $client->listIpForwardingRules(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Creates a load balancer rule
/*
$res = $client->createLoadBalancerRule(
    "",  // $algorithm : load balancer algorithm (source, roundrobin, leastconn)
    "",  // $name : name of the load balancer rule
    "",  // $privatePort : the private port of the private ip address/virtual machine where the network traffic will be load balanced to
    "",  // $publicIpId : public ip address id from where the network traffic will be load balanced from
    ""   // $publicPort : the public port from where the network traffic will be load balanced from
);
var_dump($res);
*/

// Deletes a load balancer rule.
/*
$res = $client->deleteLoadBalancerRule(
    ""   // $id : the ID of the load balancer rule
);
var_dump($res);
*/

// Removes a virtual machine or a list of virtual machines from a load balancer rule.
/*
$res = $client->removeFromLoadBalancerRule(
    "",  // $id : The ID of the load balancer rule
    ""   // $virtualMachineIds : the list of IDs of the virtual machines that are being removed from the load balancer rule (i.e. virtualMachineIds=1,2,3)
);
var_dump($res);
*/

// Assigns virtual machine or a list of virtual machines to a load balancer rule.
/*
$res = $client->assignToLoadBalancerRule(
    "",  // $id : the ID of the load balancer rule
    ""   // $virtualMachineIds : the list of IDs of the virtual machine that are being assigned to the load balancer rule(i.e. virtualMachineIds=1,2,3)
);
var_dump($res);
*/

// Lists load balancer rules.
/*
$res = $client->listLoadBalancerRules(
    ""   // $page : Pagination
);
var_dump($res);
*/

// List all virtual machine instances that are assigned to a load balancer rule.
/*
$res = $client->listLoadBalancerRuleInstances(
    "",  // $id : the ID of the load balancer rule
    ""   // $page : Pagination
);
var_dump($res);
*/

// Updates load balancer
/*
$res = $client->updateLoadBalancerRule(
    ""   // $id : the id of the load balancer rule to update
);
var_dump($res);
*/

// Retrieves a cloud identifier.
/*
$res = $client->getCloudIdentifier(
    ""   // $userId : the user ID for the cloud identifier
);
var_dump($res);
*/

// Creates a vm group
/*
$res = $client->createInstanceGroup(
    ""   // $name : the name of the instance group
);
var_dump($res);
*/

// Deletes a vm group
/*
$res = $client->deleteInstanceGroup(
    ""   // $id : the ID of the instance group
);
var_dump($res);
*/

// Updates a vm group
/*
$res = $client->updateInstanceGroup(
    ""   // $id : Instance group ID
);
var_dump($res);
*/

// Lists vm groups
/*
$res = $client->listInstanceGroups(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists capabilities
/*
$res = $client->listCapabilities(
    ""   // $page : Pagination
);
var_dump($res);
*/

// List hypervisors
/*
$res = $client->listHypervisors(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists zones
/*
$res = $client->listZones(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists all available network offerings.
/*
$res = $client->listNetworkOfferings(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Creates a network
/*
$res = $client->createNetwork(
    "",  // $displayText : the display text of the network
    "",  // $name : the name of the network
    "",  // $networkOfferingId : the network offering id
    ""   // $zoneId : the Zone ID for the Vlan ip range
);
var_dump($res);
*/

// Deletes a network
/*
$res = $client->deleteNetwork(
    ""   // $id : the ID of the network
);
var_dump($res);
*/

// Lists all available networks.
/*
$res = $client->listNetworks(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Lists resource limits.
/*
$res = $client->listResourceLimits(
    ""   // $page : Pagination
);
var_dump($res);
*/

// Logs a user into the CloudStack. A successful login attempt will generate a JSESSIONID cookie value that can be passed in subsequent Query command calls until the "logout" command has been issued or the session has expired.
/*
$res = $client->login(
    "",  // $userName : Username
    ""   // $password : Password
);
var_dump($res);
*/

// Logs out the user
// $client->logout();

