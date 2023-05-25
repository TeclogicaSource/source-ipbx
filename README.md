# source-ipbx

IPBX System using opensource Asterisk version

This repository contains the documentation for the Telephone System software, providing comprehensive information on its features, configuration, and usage. Please refer to the appropriate language link above to access the complete documentation.

## Getting Started

To get started with the Telephone System, follow these steps:

1. Download the VoIP system ISO, the ISO is downloadable at (https://github.com/TeclogicaSource/source-ipbx/iso/DVD-IPBX2.2.2.6.2.i386.iso)
2. Create a DVD or start a virtual machine with the ISO.
2. Configure the system by following the instructions provided in the documentation.

To install the telephone system, follow these steps:

1. During the machine's boot, press the <Enter> key to be guided through the installation process and receive information about the progress.
After the installation is complete and the computer restarts, you will be presented with a command prompt. Access it using the "root" username and the password "_cell".
2. Once you access the command prompt, type "setup" and follow the default configuration procedures for CentOS 5.5.
3. After completing the network configuration, access the telephony website using the server's IP address (http://internalipserver). The default username is "admin", and the password is "_cell".
4. It is recommended to start the configuration on the parameter screen, where you will enter the starting and ending extensions to set up the necessary extension range.
5. Proceed to configure the outbound and inbound call interfaces according to your needs.
6. Continue configuring the auto-attendant menus, call queues, agents, and other options detailed in the following chapters, according to your company's specific requirements.

Make sure to carefully follow the instructions and configure the options according to your needs to ensure the proper functioning of the telephone system.

Note: If the server is accessible over the internet, it is highly recommended to set up a firewall and use the security script provided with the IPBX installation ISO. These measures help ensure the system's protection against potential attacks and secure data access to the company's dialing system.

## Features

1. Call Center Screens: Provides a user interface for managing and handling calls in a call center environment.
2. Configurable Call Routing: Allows customization of call routing rules based on various criteria, such as time, caller ID, and dialed number.
3. Call Queues: Enables the creation of queues to hold incoming calls until agents are available to handle them.
4. Interactive Voice Response (IVR): Allows the setup of automated voice menus and prompts to guide callers through menu options.
5. Call Recording: Provides the ability to record and store calls for quality assurance, compliance, or training purposes.
6. Real-Time Monitoring: Allows supervisors to monitor call center activities and view real-time statistics, such as call volume and agent availability.
7. Historical Reporting: Generates detailed reports on call center performance, including metrics like call duration, wait time, and agent productivity.
8. Agent Management: Enables supervisors to manage agent availability, assign and transfer calls, and view agent status.
9. Access Control and Admin Area: Offers granular control over user access to call center screens and resources through individual screen permissions or predefined access groups.
10. Audit Trail: Records all system configuration changes for control, historical tracking, and error identification.
11. Backup/Restore: Provides the ability to create manual backups of system data and configurations for recovery purposes.
12. LDAP Integration: Integrates with LDAP servers for retrieving user data and associating it with telephone extensions in the system.
13. System Parameters: Allows customization of global parameters, such as default message, maximum call duration, webservice password, SMTP settings, and more.
14. Redundancy/Failover: Supports the configuration of a standby call center as a backup in case of issues with the primary center.
15. IP Settings/Diagnostics and Services: Displays information about server status, including IP configurations, service status, inode count, disk usage, and memory usage.
16. API: Offers an application programming interface for integration with other systems or applications, allowing external software to interact with the call center solution.

## Configuration

The Telephone System can be configured by modifying the appropriate configuration files. Refer to the documentation for detailed instructions on how to configure various aspects of the system.

You can download documentation using the following access:
[![English and Portuguese Documentation](https://github.com/TeclogicaSource/source-ipbx/docs/)

## Contributing

Contributions to the Telephone System documentation are welcome. If you find any issues or would like to suggest improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [GPL] you can read the original (https://github.com/TeclogicaSource/source-ipbx).
