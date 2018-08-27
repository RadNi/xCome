import unittest

from selenium import webdriver

from test_utility import static_data, fields


class Clerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=clerk", "password=clerk",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "profile/show-clerk-send-message")

    def test_clerk_verification_accept(self):
        fields.get_components_by_name(self.driver, ["message=hello", "send"])[1].click()
        assert self.driver.find_element_by_id("message").text == "Message"

    def tearDown(self):
        self.driver.close()
