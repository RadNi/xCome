import unittest

from selenium import webdriver

from test_utility import static_data, fields


class Clerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_clerk_verification_accept(self):
        driver = self.driver
        driver.get(static_data.base_url + "clerk/send-message")
        fields.get_components_by_name(driver, ["message=hello", "send"])[1].click()
        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
